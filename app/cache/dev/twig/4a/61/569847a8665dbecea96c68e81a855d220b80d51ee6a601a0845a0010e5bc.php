<?php

/* ::menu.html.twig */
class __TwigTemplate_4a61569847a8665dbecea96c68e81a855d220b80d51ee6a601a0845a0010e5bc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'navigation' => array($this, 'block_navigation'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('navigation', $context, $blocks);
        // line 17
        echo " 
";
    }

    // line 1
    public function block_navigation($context, array $blocks = array())
    {
        // line 2
        echo "<nav>
    <ul class=\"navigation\">
        <li><a href=\"";
        // line 4
        echo $this->env->getExtension('routing')->getPath("BloggerBlogBundle_homepage");
        echo "\">Home</a></li>
        <li><a href=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("BloggerBlogBundle_about");
        echo "\">About</a></li>
        <li><a href=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath("BloggerBlogBundle_contact");
        echo "\">Contact</a></li>
                ";
        // line 7
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 8
            echo "                        <li><a href=\"#\" >My Blogs</a></li>
                        <li><a href=\"#\" >My Profile</a></li>
                        <li><a href=\"";
            // line 10
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\" >Logout</a></li>
                ";
        } else {
            // line 12
            echo "                        <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("register");
            echo "\" >Register</a></li>
                        <li><a href=\"";
            // line 13
            echo $this->env->getExtension('routing')->getPath("login");
            echo "\" >Login</a></li>
                ";
        }
        // line 15
        echo "    </ul>
</nav>
";
    }

    public function getTemplateName()
    {
        return "::menu.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  57 => 12,  52 => 10,  42 => 6,  30 => 2,  27 => 1,  22 => 17,  20 => 1,  223 => 56,  203 => 54,  199 => 53,  196 => 52,  193 => 51,  188 => 46,  185 => 45,  180 => 41,  175 => 38,  167 => 33,  159 => 32,  155 => 29,  152 => 28,  149 => 27,  144 => 17,  118 => 15,  114 => 12,  110 => 10,  107 => 9,  101 => 5,  96 => 68,  94 => 51,  89 => 48,  87 => 45,  82 => 42,  76 => 39,  66 => 33,  62 => 13,  58 => 30,  46 => 7,  34 => 4,  28 => 1,  43 => 19,  40 => 11,  104 => 26,  95 => 23,  86 => 19,  80 => 41,  74 => 38,  67 => 15,  63 => 12,  56 => 27,  48 => 8,  41 => 9,  38 => 5,  32 => 4,  29 => 3,);
    }
}
