<?php

namespace Blogger\UserBundle\Controller;

use Blogger\UserBundle\Entity\User;
use Blogger\UserBundle\Entity\UserSecurity;
use Blogger\UserBundle\Form\Model\ResetPassword;
use Blogger\UserBundle\Form\Model\ResetPasswordType;
use Blogger\UserBundle\Form\UserType;
use DateTime;
use Doctrine\ORM\NoResultException;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Exception\ConstraintDefinitionException;

class SecurityController extends Controller {

    const BOOLEAN = 0;
    const USER_OBJECT = 1;
    const SECURTIY_USER_OBJECT = 2;

    public function resetPasswordAction($using = "email") {

        $resetPwd = new ResetPassword();
        $form = $this->createForm(new ResetPasswordType(), $resetPwd);
        $form->remove('resetcode');
        $form->handleRequest($this->getRequest());


        if ($form->isValid()) {
            $user = null;
            $email = $form->get("email")->getData();
            $user = $this->isEmailExist($email, self::USER_OBJECT);
            if ($user instanceof UserInterface) {
                $this->generateUniqueCode($user);
                $this->sendConfirmationCode($user);
            } else {
                if ($user === FALSE) {
                    $this->get('session')->getFlashBag()->add('flashError', $email . " is not registred.");
                }
            }

            return $this->redirect($this->generateUrl("BloggerUserBundle_reset_password_email_link", array("tech" => "code")));
        }

        return $this->render("BloggerUserBundle:Security:resetPassword.html.twig", array("form" => $form->createView()));
    }

    public function confirmResetCodeAction($tech) {

        $resetPwd = new ResetPassword();
        $form = $this->createForm(new ResetPasswordType(), $resetPwd);
        $form->remove("email");
        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $user = null;
            $code = $form->get("resetcode")->getData();
            $user = $this->isResetCodeExist($code, self::USER_OBJECT);
            if ($user instanceof UserInterface) {

                return $this->redirect($this->generateUrl("BloggerUserBundle_reset_newpassword", array("id" => $user->getId(), "resetcode" => $code)));
            } else {
                if ($user === FALSE) {
                    $this->get('session')->getFlashBag()->add('flashError', "Enterd code is not valid or used.");
                }
            }
        }
        return $this->render("BloggerUserBundle:Security:confirmResetCode.html.twig", array("form" => $form->createView()));
    }

    public function newPasswordAction($id, $resetcode) {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("BloggerUserBundle:User")->find($id);


        if ($user instanceof UserInterface && $this->isResetCodeExist($resetcode)) {

            $chgPwd = new User();

            $form = $this->createForm(new UserType(), $chgPwd);
            $form->remove('username');
            $form->remove('firstname');
            $form->remove('middlename');
            $form->remove('lastname');
            $form->remove('sex');
            $form->remove('birthdate');
            $form->remove('email');
            $form->remove('salt');
            $form->remove('roles');
            $form->remove('isActive');
            $form->remove('image');
            $form->add('Reset Password', 'submit');


            $form->handleRequest($this->getRequest());

            $factory = $this->get('security.encoder_factory'); // get use encoder factory
            $encoder = $factory->getEncoder($chgPwd);

            if ($form->isSubmitted()) {
                $user->getSecurity()->setIsLastCodeUsed(TRUE);
                $em = $this->getDoctrine()->getManager();
                $pasword = $encoder->encodePassword($chgPwd->getPassword(), $user->getSalt());
                $user->setPassword($pasword);
                $em->persist($user->getSecurity());
                $em->persist($user);
                $em->flush();
                $this->get("session")->getFlashBag()->add("loginSuccess", "Your Password is changed , SingIn to countinue !!");
                return $this->redirect($this->generateUrl("login"));
            }
        }
        $this->get("session")->getFlashBag()->add("flashInfo", "Please !! Enter a new password.");
        return $this->render("BloggerUserBundle:Security:newPassword.html.twig", array("form" => $form->createView()));
    }

    /**
     * @todo confirmed email implimentation not complete
     * 
     * @param type $email
     * @return boolean "return TRUE if email id is registerd else return FALSE"
     */
    protected function isEmailExist($email, $return_type = self::BOOLEAN, $confirmed = false) {
        $em = $this->getDoctrine()->getManager();
        try {
            $user = $em->getRepository("BloggerUserBundle:User")->createQueryBuilder("u")->where("u.email= :email")->setParameter("email", $email)->getQuery()->getSingleResult();
        } catch (NoResultException $e) {
            return FALSE;
        }

        if ($user instanceof UserInterface) {
            if ($return_type === self::USER_OBJECT) {
                return $user;
            }
            return TRUE;
        }
        return FALSE;
    }

    /**
     * @todo confirmed email implimentation not complete
     * 
     * @param type $email
     * @return boolean "return TRUE if email id is registerd else return FALSE"
     */
    protected function isResetCodeExist($code, $return_type = self::BOOLEAN, $confirmed = false) {
        $em = $this->getDoctrine()->getManager();
        $userSecurity = NULL;

        try {
            $userSecurity = $em->getRepository("BloggerUserBundle:UserSecurity")->createQueryBuilder("u")->where("u.resetCode= :resetcode and u.isLastCodeUsed= :used")->setParameter("resetcode", $code)->setParameter("used", FALSE)->getQuery()->getSingleResult();
        } catch (NoResultException $e) {
            return FALSE;
        }

        if ($userSecurity->getUser() instanceof UserInterface && $userSecurity instanceof UserSecurity) {
            if ($return_type === self::USER_OBJECT) {
                return $userSecurity->getUser();
            } elseif ($return_type === self::SECURTIY_USER_OBJECT) {
                return $userSecurity;
            }
            return TRUE;
        }


        return FALSE;
    }

    /**
     * 
     * @param type $username
     * @return boolean "return TRUE if username is registerd else return FALSE"
     */
    protected function isUserNameExist($username, $return_type = self::BOOLEAN) {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("BloggerUserBundle:User")->findBy(array("username" => $username));
        if ($user) {
            if ($return_type === self::USER_OBJECT) {
                return $user;
            }
            return TRUE;
        }
        return FALSE;
    }

    /**
     * @todo  IsLastCodeUsed funcationality not implemented. 
     */
    protected function generateUniqueCode(UserInterface $user) {
        $em = $this->getDoctrine()->getManager();
        if ($user instanceof UserInterface) {
            $code = md5(time() . $user->getId() . $user->getUsername());
            if ($user->getSecurity()) {
                $userSecurity = $user->getSecurity();
            } else {
                $userSecurity = new UserSecurity();
            }

            $this->isLastGeneratedCodeUsed($userSecurity);
            $userSecurity->setUser($user);
            $userSecurity->setGenerationDate(new DateTime());
            $userSecurity->setResetCode($code);
            $em->persist($userSecurity);
            $em->flush();
            return $userSecurity;
        }
        return NULL;
    }

    protected function sendConfirmationCode(UserInterface $user) {

        if ($user instanceof UserInterface) {

            $message = Swift_Message::newInstance()
                    ->setSubject('Password Resetcode.')
                    ->setTo($user->getEmail())
                    ->setBody($this->renderView('BloggerUserBundle:Security:passwordResetEmailTemplate.html.twig', array('user' => $user)), "text/html");
            $this->get('mailer')->send($message);

            $this->get('session')->getFlashBag()->add('flashSuccess', 'Your reset code was successfully sent to' . $user->getEmail() . ".");
        }
    }

    protected function isLastGeneratedCodeUsed(UserSecurity $security) {
//        $em=  $this->getDoctrine()->getManager();
        if (!$security instanceof UserSecurity) {
            throw new ConstraintDefinitionException("Argument must be object of UserSecurity !");
        }

        if ($security->getIsLastCodeUsed() === TRUE) {
            $security->setIsLastCodeUsed(FALSE);
        }
    }

}
