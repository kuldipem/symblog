<?php

namespace Blogger\FriendBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class FriendController extends Controller
{
        
    /**
     * @Route("/friend-suugestion-bar")
     * @Template("BloggerFriendBundle:Friend:friendSuggestionBar.html.twig")
     */
    public function friendSuggestionBarAction()
    {
        $em=  $this->getDoctrine()->getManager();
        $users=  $em->getRepository("BloggerUserBundle:User")->getInpiredByUsers($this->getUser());
                        
        return array("users"=>$users);
    }
    
    /**
     * @Route("/friend-request-send/{by_user_id}/{to_user_id}", options={"expose"=true} )
     * 
     */
    public function sendFriendRequestAction(){
        $request=  $this->getRequest();
        if($request->isXmlHttpRequest()){
            $request_by=$request->get("by_user_id");
            $request_to=$request->get("to_user_id");
            $friendRequest=  $this->getDoctrine()->getManager()->getRepository("BloggerFriendBundle:FriendRequest")->sendFriendRequest($request_by,$request_to);
            
            $response=new Response(json_encode($friendRequest));
            $response->headers->set("Content-Type","application/json");
            return  $response;
        }
    }
}
