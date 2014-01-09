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

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller {

    public function showAction($id, $slug) {
        $em = $this->getDoctrine()->getManager();
        $blog = $em->getRepository("BloggerBlogBundle:Blog")->find($id);
        if (!$blog) {
            throw $this->createNotFoundException("Unabale to find specified blog");
        }

        $comments = $em->getRepository('BloggerBlogBundle:Comment')
                ->getCommentsForBlog($blog->getId());

        return $this->render('BloggerBlogBundle:Blog:show.html.twig', array(
                    'blog' => $blog,
                    'comments' => $comments
        ));
    }

    public function tagFilterAction($tag) {
        $em = $this->getDoctrine()->getManager();
        $blogs = $em->getRepository("BloggerBlogBundle:Blog")->getTagFilter($tag);
        if (!$blogs) {
          //  throw $this->createNotFoundException("There is no result for this tag \"$tag\" ");
        }
        return $this->render('BloggerBlogBundle:Blog:tagFilter.html.twig', array("blogs" => $blogs));
    }

}

?>
