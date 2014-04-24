<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller {

    public function searchAction(Request $request) {

        $filedName = "";
        $keyword = "";
        $result = "";

        if ($request->query->has("Search")) {
            $em = $this->getDoctrine()->getManager();
            $filedName = $request->query->get("SearchOn");
            $keyword = $request->query->get("Search");
            $result = $em->getRepository("BloggerBlogBundle:Blog")->makeSearchOnBlog($filedName, $keyword);
        }

        return $this->render("BloggerBlogBundle:Search:search.html.twig", array($filedName, $keyword));
    }

    public function advanceSearchAction() {
        return $this->render("BloggerBlogBundle:Search:advanceSearch.html.twig");
    }

}
