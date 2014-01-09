<?php

/*
 * To change this template, choose Tools | T pla tes
 * and open the template in the editor.
 * /

  /**
 * Descri pt on of CommentController

  @author svsoft126
 */

namespace Blogger\BlogBundle\Controller;

use Blogger\BlogBundle\Entity\Comment;
use Blogger\BlogBundle\Form\CommentType;
use Blogger\UserBundle\Entity\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Comment controller.
 */
class CommentController extends Controller {

    public function newAction($blog_id) {

        $blog = $this->getBlog($blog_id);
        $request = $this->getRequest();
   
        $comment = new Comment();
        $comment->setBlog($blog);
        $comment->setUser($this->getUser());


        $form = $this->createForm(new CommentType(), $comment);
        $form->remove('approved');
        $form->remove('created');
        $form->remove('updated');
        $form->remove('blog');
        $form->remove('user');

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()
                    ->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirect($this->generateUrl('BloggerBlogBundle_blog_show', array(
                                'id' => $comment->getBlog()->getId(),
                                'slug' => $comment->getBlog()->getSlug())) .
                            '#comment-' . $comment->getId()
            );
        }




        return $this->render('BloggerBlogBundle:Comment:form.html.twig', array(
                    'comment' => $comment,
                    'form' => $form->createView()
        ));
    }

    public function createAction($blog_id) {

        /*
          $blog = $this->getBlog($blog_id);


          $comment = new Comment();
          $comment->setBlog($blog);
          $comment->setUser($this->getUser());

          $request = $this->getRequest();
          $form = $this->createForm(new CommentType(), $comment);
          $form->handleRequest($request);


          return $this->render('BloggerBlogBundle:Comment:create.html.twig', array(
          'comment' => $comment,
          'form' => $form->createView()
          )); */
    }

    protected function getBlog($blog_id) {
        $em = $this->getDoctrine()
                ->getManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($blog_id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $blog;
    }

    public function deleteAction($blog_id, $comment_id) {
        $em = $this->getDoctrine()
                ->getManager();

        $comment = $em->getRepository('BloggerBlogBundle:Comment')->find($comment_id);
        $em->remove($comment);
        $em->flush();

        $blog = $em->getRepository("BloggerBlogBundle:Blog")->find($blog_id);

        return $this->redirect($this->generateUrl("BloggerBlogBundle_blog_show", array("id" => $blog_id, "slug" => $blog->getSlug())));
    }

}

?>
