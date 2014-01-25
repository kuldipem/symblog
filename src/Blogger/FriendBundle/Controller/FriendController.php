<?php

namespace Blogger\FriendBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class FriendController extends Controller {

    /**
     * @uses  Test 
     * @Route("/friend")
     * @Template("BloggerFriendBundle:Friend:index.html.twig")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager()->getRepository("BloggerUserBundle:User");
        $user = $this->getUser();
        /* GET  ARRAY OF SEND REQUEST USER'S ID ' */
        $requestSendUsers = $user->getSendFriendRequests();
        $requestSendUserIdArray = array();
        foreach ($requestSendUsers as $rs) {
            $requestSendUserIdArray[] = $rs->getRequestTo()->getId();
        }

        /* GET  ARRAY OF GET REQUEST USER'S ID ' */
        $requestGetUsers = $user->getGetFriendRequests();
        $requestGetUserIdArray = array();
        foreach ($requestGetUsers as $rs) {
            $requestGetUserIdArray[] = $rs->getRequestBy()->getId();
        }

        $qb = $em->createQueryBuilder('u');
        $qb->Where('u.id!=:id')->setParameter("id", $user->getId());

        if (!empty($requestGetUserIdArray)) {
            $qb->andWhere($qb->expr()->notIn("u.id", $requestGetUserIdArray));
        }

        if (!empty($requestSendUserIdArray)) {
            $qb->andWhere($qb->expr()->notIn("u.id", $requestSendUserIdArray));
        }
        $obj = $qb->setMaxResults(3)->getQuery()->getResult();

        return array("obj" => $obj, "get" => $requestGetUserIdArray, "send" => $requestSendUserIdArray);
    }

    /**
     * @Route("/friend-suugestion-bar")
     * @Template("BloggerFriendBundle:Friend:friendSuggestionBar.html.twig")
     */
    public function friendSuggestionBarAction() {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository("BloggerUserBundle:User")->getInpiredByUsers($this->getUser());

        return array("users" => $users);
    }

    /**
     * @Route("/friend-request-send/{by_user_id}/{to_user_id}", options={"expose"=true} )
     * 
     */
    public function sendFriendRequestAction() {
        $request = $this->getRequest();
        if ($request->isXmlHttpRequest()) {
            $request_by = $request->get("by_user_id");
            $request_to = $request->get("to_user_id");
            $friendRequest = $this->getDoctrine()->getManager()->getRepository("BloggerFriendBundle:FriendRequest")->sendFriendRequest($request_by, $request_to);

            $response = new Response(json_encode($friendRequest));
            $response->headers->set("Content-Type", "application/json");
            return $response;
        }
    }

    /**
     * @Route("/friend-request-bar")
     * @Template("BloggerFriendBundle:Friend:friendRequestBar.html.twig")
     */
    public function friendRequestBarAction() {
        $requests = $this->getUser()->getGetFriendRequests();

        return array("requests" => $requests);
    }

}
