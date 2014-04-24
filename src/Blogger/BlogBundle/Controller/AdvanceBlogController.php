<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdvanceBlogController extends Controller {

    private $em;

    public function __construct() {
        parent::__constuct();

        $this->em = $this->getDoctrine()->getManager();
    }

    public function showAction($year, $month, $day, $id, $slug) {
         
        $blog = $this->em->getRepository("BloggerBlogBundle:Blog")->find($id);
        if (!$blog) {
            throw $this->createNotFoundException("Unabale to find specified blog");
        }
        
        return $this->render('BloggerBlogBundle:AdvanceBlog:show.html.twig', array(
                    'blog' => $blog        
        ));
        
    }

}
