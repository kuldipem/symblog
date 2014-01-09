<?php

namespace Blogger\UserBundle\Controller;

use Blogger\UserBundle\Entity\User;
use Blogger\UserBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class UserController extends Controller {

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $blogs = $em->getRepository("BloggerBlogBundle:Blog")->getLatestBlogs();
        return $this->render('BloggerBlogBundle:Page:index.html.twig', array("blogs" => $blogs));
    }

    public function loginAction() {

        if ($this->getUser()) {

            $em = $this->getDoctrine()->getManager();
            $blogs = $em->getRepository("BloggerBlogBundle:Blog")->getLatestBlogs();

            return $this->redirect($this->generateUrl("BloggerBlogBundle_homepage"));
        } else {
            $request = $this->getRequest();
            $session = $request->getSession();
            // get the login error if there is one
            if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
                $error = $request->attributes->get(
                        SecurityContext::AUTHENTICATION_ERROR
                );
            } else {
                $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
                $session->remove(SecurityContext::AUTHENTICATION_ERROR);
            }

            return $this->render(
                            'BloggerUserBundle:User:login.html.twig', array(
                        // last username entered by the user
                        'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                        'error' => $error,
                            )
            );
        }
    }

    public function registerAction() {
        $request = $this->getRequest();
        $register = new User();
        $form = $this->createForm(new UserType(), $register);

        $factory = $this->get('security.encoder_factory'); // get use encoder factory
        $encoder = $factory->getEncoder($register);

        $form->add("SignUp", "submit");

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            
            /* TO SALT PASSWORD WITH ENCODER FACTORY*/
            $pasword = $encoder->encodePassword($register->getPassword(), $register->getSalt());
            $register->setPassword($pasword);


            $em->persist($register);
            $em->flush();
            return $this->redirect($this->generateUrl("login"));
        }

        return $this->render('BloggerUserBundle:User:register.html.twig', array('register' => $form->createView()));
    }

//    public function handleRegisterAction() {
//        $request = $this->getRequest();
//        $register = new User();
//        $form = $this->createForm(new UserType(), $register);
//
//        $form->handleRequest($request);
//        if ($form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($register);
//            $em->flush();
//            return $this->redirect($this->generateUrl("login"));
//        }
//
//        return $this->render('BloggerUserBundle:User:register.html.twig', array('register' => $form->createView()));
//    }
}
