<?php

namespace Blogger\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TagsController extends Controller
{
  
    public function getTagsAction()
    {
        $request=$this->getRequest();
        
        if($request->isXmlHttpRequest()){
            $tags=$this->getDoctrine()->getManager()->getRepository("BloggerBlogBundle:Blog")->getUniqueTags();
            return new Response(json_encode($tags)); ;
        }
        
        
    }

}
