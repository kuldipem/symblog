<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PageController
 *
 * @author svsoft126
 */

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blogger\BlogBundle\Entity\Enquiry;
use Blogger\BlogBundle\Form\EnquiryType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

class PageController extends Controller {

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $q = "SELECT b FROM BloggerBlogBundle:Blog b";
        $qur = $em->createQuery($q);
        $paginator = $this->get("knp_paginator");

        $pagination = $paginator->paginate($qur, $this->getRequest()->query->get("page", 1), 5);
//        $blogs = $em->getRepository("BloggerBlogBundle:Blog")->getLatestBlogs();

        return $this->render('BloggerBlogBundle:Page:index.html.twig', array("blogs" => $pagination));
    }

    public function advanceHomeAction() {
        $em = $this->getDoctrine()->getManager();
        $q = "SELECT b FROM BloggerBlogBundle:Blog b";
        $qur = $em->createQuery($q);
        $paginator = $this->get("knp_paginator");

        $pagination = $paginator->paginate($qur, $this->getRequest()->query->get("page", 1), 5);
//        $blogs = $em->getRepository("BloggerBlogBundle:Blog")->getLatestBlogs();

        return $this->render('BloggerBlogBundle:Page:advanceHome.html.twig', array("blogs" => $pagination));
    }

    public function aboutAction() {
        return $this->render('BloggerBlogBundle:Page:about.html.twig');
    }

    public function contactAction() {
        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType, $enquiry);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                        ->setSubject('Contact enquiry from symblog')
                        ->setFrom('ksoftxpress@gmail.com')
                        ->setTo('kuldipem@gmail.com')
                        ->setBody($this->renderView('BloggerBlogBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));
                $this->get('mailer')->send($message);

                $this->get('session')->getFlashBag()->add('blogger-notice', 'Your contact enquiry was successfully sent. Thank you!');

                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page
                return $this->redirect($this->generateUrl('BloggerBlogBundle_contact'));
            }
        }


        return $this->render('BloggerBlogBundle:Page:contact.html.twig', array('form' => $form->createView()));
    }

    public function sidebarAction() {
        $em = $this->getDoctrine()
                ->getManager();

        $tags = $em->getRepository('BloggerBlogBundle:Blog')
                ->getTags();

        $tagWeights = $em->getRepository('BloggerBlogBundle:Blog')
                ->getTagWeights($tags);

        $commentLimit = $this->container
                ->getParameter('blogger_blog.comments.latest_comment_limit');
        $latestComments = $em->getRepository('BloggerBlogBundle:Comment')
                ->getLatestComments($commentLimit);

        return $this->render('BloggerBlogBundle:Page:sidebar.html.twig', array(
                    'latestComments' => $latestComments,
                    'tags' => $tagWeights
        ));
    }

}

?>
