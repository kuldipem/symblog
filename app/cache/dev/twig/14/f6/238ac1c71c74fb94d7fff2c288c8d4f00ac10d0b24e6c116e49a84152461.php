<?php

/* BloggerBlogBundle:Page:sidebar.html.twig */
class __TwigTemplate_14f6238ac1c71c74fb94d7fff2c288c8d4f00ac10d0b24e6c116e49a84152461 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<section class=\"section\">
    <header>
        <h3>Tag Cloud</h3>
    </header>
    <p class=\"tags\">
        ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tags"]) ? $context["tags"] : $this->getContext($context, "tags")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["tag"] => $context["weight"]) {
            // line 8
            echo "        <span class=\"weight-";
            echo twig_escape_filter($this->env, (isset($context["weight"]) ? $context["weight"] : $this->getContext($context, "weight")), "html", null, true);
            echo "\"><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("BloggerBlogBundle_blog_tag_filter", array("tag" => (isset($context["tag"]) ? $context["tag"] : $this->getContext($context, "tag")))), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, (isset($context["tag"]) ? $context["tag"] : $this->getContext($context, "tag")), "html", null, true);
            echo "</a></span>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 10
            echo "    <p>There are no tags</p>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['tag'], $context['weight'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "</p>
</section>
<section class=\"section\">
    <header>
        <h3>Latest Comments</h3>
    </header>
    ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["latestComments"]) ? $context["latestComments"] : $this->getContext($context, "latestComments")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 19
            echo "    <article class=\"comment\">
        <header>
            <p class=\"small\"><span class=\"highlight\">";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "user"), "html", null, true);
            echo "</span> commented on
                <a href=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("BloggerBlogBundle_blog_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "blog"), "id"), "slug" => $this->getAttribute($this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "blog"), "slug"))), "html", null, true);
            echo "#comment-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "id"), "html", null, true);
            echo "\">
    ";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "blog"), "title"), "html", null, true);
            echo "
                </a>

                [ <em><time datetime=\"";
            // line 26
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "created"), "c"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "created"), "c"), "html", null, true);
            echo "</time></em>]
            </p>
        </header>
        <p>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "comment"), "html", null, true);
            echo "</p>
        </p>
    </article>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 33
            echo "    <p>There are no recent comments</p>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "</section>";
    }

    public function getTemplateName()
    {
        return "BloggerBlogBundle:Page:sidebar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 35,  92 => 29,  84 => 26,  78 => 23,  72 => 22,  68 => 21,  64 => 19,  59 => 18,  51 => 12,  44 => 10,  19 => 1,  57 => 12,  52 => 10,  42 => 6,  30 => 2,  27 => 7,  22 => 17,  20 => 1,  223 => 56,  203 => 54,  199 => 53,  196 => 52,  193 => 51,  188 => 46,  185 => 45,  180 => 41,  175 => 38,  167 => 33,  159 => 32,  155 => 29,  152 => 28,  149 => 27,  144 => 17,  118 => 15,  114 => 12,  110 => 10,  107 => 9,  101 => 33,  96 => 68,  94 => 51,  89 => 48,  87 => 45,  82 => 42,  76 => 39,  66 => 33,  62 => 13,  58 => 30,  46 => 7,  34 => 4,  28 => 1,  43 => 19,  40 => 11,  104 => 26,  95 => 23,  86 => 19,  80 => 41,  74 => 38,  67 => 15,  63 => 12,  56 => 27,  48 => 8,  41 => 9,  38 => 5,  32 => 8,  29 => 3,);
    }
}
