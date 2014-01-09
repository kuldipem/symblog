<?php

/* BloggerBlogBundle:Comment:index.html.twig */
class __TwigTemplate_fd6df0236883e1703c37c2611c08e9c93f2454d160599cbd21678a80eafe7b23 extends Twig_Template
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
";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["comments"]) ? $context["comments"] : $this->getContext($context, "comments")));
        $context['_iterated'] = false;
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 3
            echo "<article class=\"comment ";
            echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index0")), "html", null, true);
            echo "\" id=\"comment-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "id"), "html", null, true);
            echo "\">
    <header>
        <p><span class=\"highlight\">";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "user"), "html", null, true);
            echo "</span> commented <time datetime=\"";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "created"), "c"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('blogger_blog_extension')->createdAgo($this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "created")), "html", null, true);
            echo "</time></p>
    </header>
    <p>";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "comment"), "html", null, true);
            echo "</p>
</article>
";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 10
            echo "<p>There are no comments for this post. Be the first to comment...</p>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "BloggerBlogBundle:Comment:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 11,  104 => 26,  84 => 26,  97 => 26,  81 => 22,  77 => 21,  223 => 56,  188 => 46,  185 => 45,  180 => 41,  175 => 38,  167 => 33,  155 => 29,  152 => 28,  118 => 15,  114 => 12,  110 => 10,  76 => 21,  58 => 30,  34 => 5,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  107 => 9,  61 => 13,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 32,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 19,  67 => 13,  63 => 12,  59 => 18,  28 => 3,  201 => 92,  196 => 52,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 46,  117 => 44,  105 => 40,  91 => 30,  62 => 13,  49 => 19,  94 => 51,  89 => 24,  85 => 23,  75 => 17,  68 => 21,  56 => 10,  87 => 45,  21 => 2,  93 => 25,  88 => 6,  78 => 23,  46 => 6,  27 => 3,  44 => 10,  31 => 4,  25 => 5,  38 => 6,  26 => 6,  24 => 2,  19 => 1,  79 => 18,  72 => 22,  69 => 25,  47 => 12,  40 => 3,  37 => 10,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 35,  101 => 33,  98 => 31,  96 => 68,  83 => 25,  74 => 17,  66 => 33,  55 => 15,  52 => 21,  50 => 13,  43 => 5,  41 => 5,  35 => 5,  32 => 3,  29 => 3,  209 => 82,  203 => 54,  199 => 53,  193 => 51,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 58,  149 => 27,  147 => 58,  144 => 17,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 34,  106 => 26,  103 => 32,  99 => 31,  95 => 23,  92 => 29,  86 => 19,  82 => 42,  80 => 22,  73 => 10,  64 => 19,  60 => 6,  57 => 7,  54 => 14,  51 => 12,  48 => 5,  45 => 11,  42 => 8,  39 => 9,  36 => 6,  33 => 4,  30 => 3,);
    }
}
