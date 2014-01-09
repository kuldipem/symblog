<?php

/* BloggerBlogBundle::layout.html.twig */
class __TwigTemplate_aa562d7516e38c2acf2198ac7b3e842c33486d7a12506242ccf7584c636c34cd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'sidebar' => array($this, 'block_sidebar'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "

    ";
    }

    // line 11
    public function block_sidebar($context, array $blocks = array())
    {
        // line 12
        echo "        ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("BloggerBlogBundle:Page:sidebar"));
        echo "
";
    }

    public function getTemplateName()
    {
        return "BloggerBlogBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 12,  40 => 11,  104 => 26,  95 => 23,  86 => 19,  80 => 18,  74 => 17,  67 => 13,  63 => 12,  56 => 10,  48 => 7,  41 => 5,  38 => 4,  32 => 4,  29 => 3,);
    }
}
