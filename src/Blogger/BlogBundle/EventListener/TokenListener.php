<?php

namespace Blogger\BlogBundle\EventListener;

use Blogger\BlogBundle\Controller\TokenAuthenticatedController;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class TokenListener
{
    private $tokens;

    public function __construct($tokens)
    {
        $this->tokens = $tokens;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController();

        /*
         * $controller passed can be either a class or a Closure. This is not usual in Symfony2 but it may happen.
         * If it is a class, it comes in array format
         */
        if (!is_array($controller)) {
            return;
        }

        if ($controller[0] instanceof TokenAuthenticatedController) {
            $token = $event->getRequest()->query->get('token');
            if (!in_array($token, $this->tokens)) {
                throw new AccessDeniedHttpException('This action needs a valid token!');
            }
        }
    }
    public function onKernelResponse(FilterResponseEvent $event)
    {
	// check to see if onKernelController marked this as a token "auth'ed" request
	if (!$token = $event->getRequest()->attributes->get('auth_token')) {
	    return;
	}

	$response = $event->getResponse();

	// create a hash and set it as a response header
	$hash = sha1($response->getContent().$token);
	$response->headers->set('X-CONTENT-HASH', $hash);
    }
}



?> 
