<?php

namespace Blogger\BlogBundle\Controller;

use Blogger\BlogBundle\Entity\Likes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LikesController extends Controller {

    public function likeAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        if ($request->isXmlHttpRequest()) {

            $user_id = $request->get('user_id');
            $blog_id = $request->get('blog_id');
            $status = $request->get('status');

            if ($status === Likes::LIKE_STATUS_UNLIKE) {

                $likes = new Likes();
                $likes->setUser($this->getUser());

                $blog = $em->getRepository("BloggerBlogBundle:Blog")->find($blog_id);

                $likes->setBlog($blog);
                $em->persist($likes);
                $em->flush();

                
                
                $likesTotal =array("likes"=>count($blog->getLikes()));

                return new Response(json_encode($likesTotal));
                
            } else if ($status === Likes::LIKE_STATUS_LIKE) {

                $blog = $em->getRepository("BloggerBlogBundle:Blog")->find($blog_id);
                $likes = $em->getRepository("BloggerBlogBundle:Likes")->findOneBy(array("blog" => $blog));
                if ($likes) {
                    $em->remove($likes);
                    $em->flush();
                }

                return new Response(json_encode(array("result" => true)));
            }
        }
    }

}
