<?php

namespace Blogger\UserBundle\Twig\Extensions;

use Symfony\Component\Security\Core\User\UserInterface;
use Twig_Extension;
use Twig_SimpleFilter;

/**
 * Description of UserExtension
 *
 * @author ganesh
 */
class UserExtension extends Twig_Extension {

    const RETURN_USERNAME = false;
    const RETURN_BOOLEAN = true;

    public function getFilters() {

        return array(new Twig_SimpleFilter("is_me", array($this, "isMe")),
            new \Twig_SimpleFilter("is_authorized", array($this, "isAuthorized")),
            new \Twig_SimpleFilter("is_fully_authorized", array($this, "isFullyAuthorized")),
            new \Twig_SimpleFilter("is_remembered_autorized", array($this, "isRememberedAutorized")),
        );
    }

    public function isMe($author, $user, $result = self::RETURN_USERNAME) {
       
        
        if ($user !== NULL && $user instanceof UserInterface) {
            if ($result === self::RETURN_USERNAME) {
                return $user->getId() === $author->getId() ? " you " : $author->getUsername();
            } else if ($result === self::RETURN_BOOLEAN) {
                return $user->getId() === $author->getId() ? TRUE : FALSE;
            }
        } else {
            if ($result === self::RETURN_BOOLEAN) {
                return false;
            } else {
                return $author->getUsername();
            }
        }
    }

    public function isAuthorized($security_context) {
        if ($security_context!=NULL || $security_context->isGranted('IS_AUTHENTICATED_FULLY') || $security_context->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return true;
        }
        return false;
    }

    public function isFullyAuthorized($user,$security_context) {
        if ($security_context!=NULL || $security_context->isGranted('IS_AUTHENTICATED_FULLY')) {
            return true;
        }
        return false;
    }

    public function isRememberedAutorized($user,$security_context) {
        if ($security_context->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return true;
        }
        return false;
    }

    public function getName() {
        return 'blogger_user_extension';
    }

}
