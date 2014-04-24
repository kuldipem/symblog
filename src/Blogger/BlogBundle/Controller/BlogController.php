<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BlogController
 *
 * @author svsoft126
 */

namespace Blogger\BlogBundle\Controller;

use Blogger\BlogBundle\Entity\Blog;
use Blogger\BlogBundle\Form\BlogType;
use Blogger\UserBundle\Entity\Repository\UserRepository;
use Doctrine\ORM\NoResultException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller {

    public function showAction($id, $slug) {

        $security_context = $this->container->get("security.context");

        $owner = FALSE; // if viewer is poster of this blog than  allow him/her to edit

        $em = $this->getDoctrine()->getManager();


        $blog = $em->getRepository("BloggerBlogBundle:Blog")->find($id);
        if (!$blog) {
            throw $this->createNotFoundException("Unabale to find specified blog");
        }

        $comments = $em->getRepository('BloggerBlogBundle:Comment')
                ->getCommentsForBlog($blog->getId());

        if (UserRepository::isAuthorized($security_context) && $this->getUser()->getUsername() === $blog->getUser()) {
            $owner = TRUE;
        }

        return $this->render('BloggerBlogBundle:Blog:show.html.twig', array(
                    'blog' => $blog,
                    'comments' => $comments,
                    'is_poster' => $owner
        ));
    }

    public function tagFilterAction($tag) {
        $em = $this->getDoctrine()->getManager();
        $blogsQuery = $em->getRepository("BloggerBlogBundle:Blog")->getTagFilterQuery($tag);
        
        $paginator=  $this->get("knp_paginator");
        
        $pagination=$paginator->paginate($blogsQuery,  $this->getRequest()->query->get("page",1),5);
        
        if (!$pagination) {
            throw $this->createNotFoundException("There is no result for this tag \"$tag\" ");
        }
        
        return $this->render('BloggerBlogBundle:Blog:tagFilter.html.twig', array("blogs" => $pagination, "tag" => $tag));
        
    }

    public function myBlogAction() {
        $em = $this->getDoctrine()->getManager();
        $qur=$em->getRepository("BloggerBlogBundle:Blog")->createQueryBuilder("b")->where("b.user=:user")->setParameter("user",$this->getUser())->getQuery();
//        $blogs = $this->getUser()->getBlogs();
        
        $paginator=  $this->get("knp_paginator");
        
        $pagination=$paginator->paginate($qur,  $this->getRequest()->query->get("page",1),5);
        
        return $this->render('BloggerBlogBundle:Blog:myBlog.html.twig', array("blogs" => $pagination));
    }

    public function createMyBlogAction() {


        $dir = __DIR__ . "/../../../../web/images";
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $blog = new Blog();
        $form = $this->createForm(new BlogType(), $blog);
        $form->add('user', 'hidden', array('data_class' => null));
        $form->remove('created')->remove('updated');
        $form->remove('slug');
        $form->add('blog', 'textarea', array("attr" => array(
                "class" => "tinymce",
                "data-theme" => "blog"
        )));
        $form->add('image', 'file');
        $form->add('tags', 'text');
        $form->add("post", "submit");

        $form->handleRequest($request);
        if ($form->isValid()) {
            $newname = md5(time() . $this->getUser()->getId()) . "." . $form["image"]->getData()->guessExtension();
            $form["image"]->getData()->move($dir, $newname);
            $blog->setImage($newname);
            $blog->setUser($this->getUser());
            $em->persist($blog);
            $em->flush();
            return $this->redirect($this->generateUrl("BloggerBlogBundle_blog_my_blog"));
        }


        return $this->render("BloggerBlogBundle:Blog:createMyBlog.html.twig", array("blog" => $form->createView()));
    }

    private $oldFileName = "";

    public function deleteOldFile($oldFileAbsPath) {

        if (is_file($oldFileAbsPath)) {
            unlink($oldFileAbsPath);
        }
    }

    public function editMyBlogAction() {
        
        $dir = __DIR__ . "/../../../../web/images";
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        if (!$request->get('slug')) {
            return $this->createNotFoundException("Blog couldn't found !!");
        }

        $qb = $em->getRepository("BloggerBlogBundle:Blog")->createQueryBuilder('e')->
                        where("e.slug=:slug")->setParameter("slug", $request->get('slug'));

        $blog = NULL;

        try {
            $blog = $qb->getQuery()->getSingleResult();
            $this->oldFileName = $blog->getImage();
        } catch (NoResultException $exc) {
            $message = sprintf('Unable to find Blog with Slug "%s".', $request->get('slug'));
            throw new NoResultException($message);
        }
        $form = $this->createForm(new BlogType(), $blog);
        
        $form->remove('created')->remove('updated')->remove('user');
        
        $form->add('image', 'file', array("data_class" => NULL));
        $form->add('tags', 'text');
        $form->add("post", "submit");
        $form->remove('slug');
        $form->add('blog', 'textarea', array("attr" => array(
                "class" => "tinymce", 'data-theme' => 'blog'
        )));

        
        $form->handleRequest($request);
        if ($form->isValid()) {
            if ($form["image"]->getData() != NULL) {
                $newname = md5(time() . $this->getUser()->getId()) . "." . $form["image"]->getData()->guessExtension();
                $form["image"]->getData()->move($dir, $newname);
                $this->deleteOldFile($dir . "/" . $this->oldFileName); // to delete old file from images directorty
                $blog->setImage($newname);
                
            } else {
                $blog->setImage($this->oldFileName);
            }
            $blog->setUser($this->getUser());
            $em->persist($blog);
            $em->flush();
            return $this->redirect($this->generateUrl("BloggerBlogBundle_blog_my_blog"));
        }
        return $this->render("BloggerBlogBundle:Blog:createMyBlog.html.twig", array("blog" => $form->createView()));
    }

    public function deleteMyBlog($id) {
            $em = $this->getDoctrine()->getManager();
            $blog = $em->getRepository("BloggerBlogBundle:Blog")->find($id);
            
            if ($blog) {
                $em->remove($blog);
                $em->flush();
            } 

            return $this->redirect($this->generateUrl("BloggerBlogBundle_blog_my_blog"));
        
    }

}

?>
