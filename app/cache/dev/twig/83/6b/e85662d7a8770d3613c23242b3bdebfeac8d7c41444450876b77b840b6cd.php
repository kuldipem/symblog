<?php

/* BloggerUserBundle:User:register.html.twig */
class __TwigTemplate_836be85662d7a8770d3613c23242b3bdebfeac8d7c41444450876b77b840b6cd extends Twig_Template
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
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["register"]) ? $context["register"] : $this->getContext($context, "register")), 'form', array("attr" => array("novalidate" => "novalidate")));
        echo "
";
    }

    public function getTemplateName()
    {
        return "BloggerUserBundle:User:register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
