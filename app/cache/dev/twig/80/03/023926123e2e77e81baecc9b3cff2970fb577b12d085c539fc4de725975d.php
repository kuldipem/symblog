<?php

/* BloggerBlogBundle:Blog:show.html.twig */
class __TwigTemplate_8003023926123e2e77e81baecc9b3cff2970fb577b12d085c539fc4de725975d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BloggerBlogBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BloggerBlogBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["blog"]) ? $context["blog"] : $this->getContext($context, "blog")), "title"), "html", null, true);
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "<article class=\"blog\">
    <header>
        <div class=\"date\"><time datetime=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["blog"]) ? $context["blog"] : $this->getContext($context, "blog")), "created"), "c"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["blog"]) ? $context["blog"] : $this->getContext($context, "blog")), "created"), "l, F j, Y"), "html", null, true);
        echo "</time></div>
        <h2>";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["blog"]) ? $context["blog"] : $this->getContext($context, "blog")), "title"), "html", null, true);
        echo "</h2>
    </header>
    <img class=\"lazy\" src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/ajax-loader.gif"), "html", null, true);
        echo "\"  data-src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(twig_join_filter(array(0 => "images/", 1 => $this->getAttribute((isset($context["blog"]) ? $context["blog"] : $this->getContext($context, "blog")), "image")))), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["blog"]) ? $context["blog"] : $this->getContext($context, "blog")), "title"), "html", null, true);
        echo " image not found\" class=\"large\" />
    <div>
        <p>";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["blog"]) ? $context["blog"] : $this->getContext($context, "blog")), "blog"), "html", null, true);
        echo "</p>
    </div>
</article>
<section class=\"comments\" id=\"comments\">
    <section class=\"previous-comments\">
        <h3>Comments</h3>
            ";
        // line 19
        $this->env->loadTemplate("BloggerBlogBundle:Comment:index.html.twig")->display(array_merge($context, array("comments" => (isset($context["comments"]) ? $context["comments"] : $this->getContext($context, "comments")))));
        // line 20
        echo "    </section>
    <h3>Add Comment <img class=\"comment-loader\" src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/ajax-loader.gif"), "html", null, true);
        echo "\" />  </h3>
       ";
        // line 22
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("BloggerBlogBundle:Comment:new", array("blog_id" => $this->getAttribute((isset($context["blog"]) ? $context["blog"] : $this->getContext($context, "blog")), "id"))));
        echo "
</section>

<script>
    \$(document).ready(function() {
        var ajax_comment = \"\";
        \$(\"ajax_send_comment\").on(\"click\", function() {
            ajax_comment = \$.ajax({
                url: \"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("BloggerBlogBundle_comment_create", array("blog_id" => $this->getAttribute((isset($context["blog"]) ? $context["blog"] : $this->getContext($context, "blog")), "id"))), "html", null, true);
        echo "\",
                data: {user: \$(\"#comment_form input[type='text']\").val(), comment: \$(\"#comment_form textarea\").val()},
                dataType: \"json\",
                success: function(data,status,xhr){
                    
                }
            });
        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "BloggerBlogBundle:Blog:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 11,  104 => 26,  84 => 26,  97 => 26,  81 => 22,  77 => 21,  223 => 56,  188 => 46,  185 => 45,  180 => 41,  175 => 38,  167 => 33,  155 => 29,  152 => 28,  118 => 15,  114 => 12,  110 => 10,  76 => 21,  58 => 30,  34 => 5,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  107 => 9,  61 => 13,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 32,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 19,  67 => 13,  63 => 12,  59 => 18,  28 => 1,  201 => 92,  196 => 52,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 46,  117 => 44,  105 => 40,  91 => 30,  62 => 13,  49 => 19,  94 => 51,  89 => 24,  85 => 23,  75 => 17,  68 => 21,  56 => 10,  87 => 45,  21 => 2,  93 => 25,  88 => 6,  78 => 23,  46 => 6,  27 => 3,  44 => 10,  31 => 4,  25 => 5,  38 => 6,  26 => 6,  24 => 2,  19 => 1,  79 => 18,  72 => 22,  69 => 25,  47 => 12,  40 => 11,  37 => 10,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 35,  101 => 33,  98 => 31,  96 => 68,  83 => 25,  74 => 17,  66 => 33,  55 => 15,  52 => 21,  50 => 13,  43 => 5,  41 => 5,  35 => 5,  32 => 3,  29 => 3,  209 => 82,  203 => 54,  199 => 53,  193 => 51,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 58,  149 => 27,  147 => 58,  144 => 17,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 34,  106 => 26,  103 => 32,  99 => 31,  95 => 23,  92 => 29,  86 => 19,  82 => 42,  80 => 22,  73 => 20,  64 => 19,  60 => 6,  57 => 11,  54 => 14,  51 => 12,  48 => 9,  45 => 11,  42 => 8,  39 => 9,  36 => 6,  33 => 4,  30 => 3,);
    }
}
