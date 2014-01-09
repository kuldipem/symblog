<?php

namespace Blogger\UserBundle\Controller;

use Blogger\UserBundle\Entity\Repository\UserRepository;
use Blogger\UserBundle\Entity\User;
use Blogger\UserBundle\Form\Model\ChangePassword;
use Blogger\UserBundle\Form\Model\ChangePasswordType;
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

        $security_context = $this->container->get('security.context');

        if (UserRepository::isAuthorized($security_context)) {
            return $this->redirect($this->generateUrl("BloggerBlogBundle_homepage"));
        } else {
            $request = $this->getRequest();
            $session = $this->get('session');
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

        $security_context = $this->container->get('security.context');

        $register = new User();
        $form = $this->createForm(new UserType(), $register);
        $form->add('password', 'password');
        $form->add('sex', 'choice', array("choices" => array("MALE" => "Male", "FEMALE" => "Female")));
        $form->add('birthdate', 'date', array("years" => range(date('Y') - 90, date('Y') - 18)));
        $form->remove('salt');
        $form->remove('roles');
        $form->remove('isActive');

        $factory = $this->get('security.encoder_factory'); // get use encoder factory
        $encoder = $factory->getEncoder($register);

        $form->add("SignUp", "submit");

        $form->handleRequest($this->getRequest());
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            /* TO SALT PASSWORD WITH ENCODER FACTORY */
            $pasword = $encoder->encodePassword($register->getPassword(), $register->getSalt());
            $register->setPassword($pasword);
            $em->persist($register);
            $em->flush();
            $this->get('session')->getFlashBag()->add('loginSuccess', 'You have register successfully !!! ');
            return $this->redirect($this->generateUrl("login"));
        }

        return $this->render('BloggerUserBundle:User:register.html.twig', array('register' => $form->createView()));
    }

    public function chanegPasswordAction() {

        $request = $this->getRequest();
        $chgPwd= new ChangePassword();
        $form = $this->createForm(new ChangePasswordType(), $chgPwd);
        $form->add('Change Password','submit');
        
        $user=  $this->getUser();
        
        $form->handleRequest($request);

        $factory = $this->get('security.encoder_factory'); // get use encoder factory
        $encoder = $factory->getEncoder($user);

        
        if ($form->isValid()) {

            $em=$this->getDoctrine()->getManager();
            
            $pasword = $encoder->encodePassword($chgPwd->getNewPassword(), $user->getSalt());
            $user->setPassword($pasword);
            $em->persist($user);
            $em->flush();
            $this->get("session")->getFlashBag()->add("loginSuccess","Your Password is changed , SingIn again !!");
            return $this->redirect($this->generateUrl("logout"));
            
        }

        return $this->render("BloggerUserBundle:User:changePassword.html.twig",array("form"=>$form->createView()));
    }

    public function logoutAction() {
//        $this->get("request")->getSession()->invalidate();
        $this->get("security.context")->setToken(null);
    }

}
