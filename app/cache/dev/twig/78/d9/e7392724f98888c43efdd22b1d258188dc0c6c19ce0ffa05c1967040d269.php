<?php

/* BloggerBlogBundle:Page:about.html.twig */
class __TwigTemplate_78d9e7392724f98888c43efdd22b1d258188dc0c6c19ce0ffa05c1967040d269 extends Twig_Template
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
        echo "About";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "<header>
    <h1>About symblog</h1>
</header>
<article>
    <p>Symfony is an Open Source PHP Web applications development framework. It was originally conceived by the interactive agency Sensio Labs for the development of web sites for its own customers. Symfony was published by the agency in 2005 under MIT Open Source license and today it is among the leading frameworks available for PHP development.
        Supported by Sensio Labs - but also by a large community - Symfony has many resources: plentiful documentation, community support (mailing lists, IRC, etc.), professional support (consulting, training, etc.), and so on.
        Available in version 2.0, Symfony already has, among the hundreds of sites and applications developed on its platform, prestigious references, such as Yahoo!, Dailymotion, Opensky.com, Exercise.com, phpBB, or Drupal. </p>
</article>
";
    }

    public function getTemplateName()
    {
        return "BloggerBlogBundle:Page:about.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 26,  81 => 22,  77 => 21,  223 => 56,  188 => 46,  185 => 45,  180 => 41,  175 => 38,  167 => 33,  155 => 29,  152 => 28,  118 => 15,  114 => 12,  110 => 10,  76 => 39,  58 => 30,  34 => 5,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  107 => 9,  61 => 13,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 32,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 20,  67 => 18,  63 => 16,  59 => 14,  28 => 1,  201 => 92,  196 => 52,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 46,  117 => 44,  105 => 40,  91 => 27,  62 => 32,  49 => 19,  94 => 51,  89 => 24,  85 => 23,  75 => 17,  68 => 14,  56 => 27,  87 => 45,  21 => 2,  93 => 25,  88 => 6,  78 => 21,  46 => 6,  27 => 4,  44 => 12,  31 => 5,  25 => 5,  38 => 6,  26 => 6,  24 => 2,  19 => 1,  79 => 18,  72 => 16,  69 => 25,  47 => 12,  40 => 11,  37 => 10,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 36,  101 => 5,  98 => 31,  96 => 68,  83 => 25,  74 => 38,  66 => 33,  55 => 15,  52 => 21,  50 => 13,  43 => 5,  41 => 9,  35 => 5,  32 => 4,  29 => 3,  209 => 82,  203 => 54,  199 => 53,  193 => 51,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 58,  149 => 27,  147 => 58,  144 => 17,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 34,  106 => 26,  103 => 32,  99 => 31,  95 => 23,  92 => 21,  86 => 19,  82 => 42,  80 => 41,  73 => 19,  64 => 17,  60 => 6,  57 => 11,  54 => 14,  51 => 11,  48 => 7,  45 => 11,  42 => 7,  39 => 9,  36 => 5,  33 => 4,  30 => 3,);
    }
}
