<?php

namespace Blogger\UserBundle\Controller;

use Blogger\UserBundle\Entity\Repository\UserRepository;
use Blogger\UserBundle\Entity\User;
use Blogger\UserBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileController extends Controller {

    public function indexAction() {

        $notice = NULL;
        $request = $this->getRequest();
        $security_context = $this->container->get('security.context');

        if (UserRepository::isFullyAuthorized($security_context)) {
            if ($this->getUser() instanceof User) {
                $user = $this->getUser();
                $form = $this->createForm(new UserType(), $user);
                $form->add("sex", "choice", array("choices" => array("MALE", "FEMALE")));
                $form->remove("password");
                $form->remove("username");
                $form->remove("salt");
                $form->remove("isActive");
                $form->remove("image");
                $form->remove("roles");

                $form->add("Save", "submit", array("attr" => array("id" => "profileSave")));
                $form->handleRequest($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($user);
                    $em->flush();
                    $notice = "Profile is update successfully !!";
                }
                return $this->render("BloggerUserBundle:Profile:index.html.twig", array("profile" => $form->createView(), "notice" => $notice));
            }
        } else {
            return $this->redirect("login");
        }
    }

    private $oldFileName = "";

    public function deleteOldFile($oldFileAbsPath) {

        if (is_file($oldFileAbsPath)) {
            unlink($oldFileAbsPath);
        }
    }

    public function imageAction() {

        $dir = __DIR__ . "/../../../../web/upload/user_images";
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository("BloggerUserBundle:User")->find($this->getUser()->getId());
        if($user->getImage()!=NULL || $user->getImage()!=''){
           $profile_img="/upload/user_images/".$user->getImage();
        }else{
            $profile_img="/images/def_img_pic.jpeg";
        }

        $form = $this->createForm(new UserType, $user);
        $form->remove('username')->remove('firstname')->remove('middlename')
                ->remove('lastname')->remove('sex')->remove('birthdate')->remove('email')
                ->remove('password')->remove('salt')->remove('roles')->remove('isActive');
        $form->add("Uplad Picture", "submit");
        $form->add('image', 'file',array("data_class"=>null));
        
         $form->handleRequest($request);
        if ($form->isValid()) {
            if ($form["image"]->getData() != NULL) {
                $newname = md5(time() . $this->getUser()->getId()) . "." . $form["image"]->getData()->guessExtension();
                $form["image"]->getData()->move($dir, $newname);
                $this->deleteOldFile($dir . "/" . $this->oldFileName); // to delete old file from images directorty
                $user->setImage($newname);
                
            } else {
                $user->setImage($this->oldFileName);
            }
            $em->persist($user);
            $em->flush();
           
        }

        return $this->render("BloggerUserBundle:Profile:imageUpload.html.twig", array("profile" => $form->createView(),"profile_img"=>$profile_img));
    }

}
