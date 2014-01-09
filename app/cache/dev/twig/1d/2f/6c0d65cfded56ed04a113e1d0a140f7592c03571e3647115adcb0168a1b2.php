<?php

/* ::base.html.twig */
class __TwigTemplate_1d2f6c0d65cfded56ed04a113e1d0a140f7592c03571e3647115adcb0168a1b2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'navigation' => array($this, 'block_navigation'),
            'blog_title' => array($this, 'block_blog_title'),
            'blog_tagline' => array($this, 'block_blog_tagline'),
            'body' => array($this, 'block_body'),
            'sidebar' => array($this, 'block_sidebar'),
            'footer' => array($this, 'block_footer'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html\" charset=utf-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo " - symblog</title>
        <!--[if lt IE 9]>
            <script src=\"http://html5shim.googlecode.com/svn/trunk/html5.js\"></script>
        <![endif]-->
        ";
        // line 9
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 19
        echo "
        <link rel=\"shortcut icon\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>

        <section id=\"wrapper\">
            <header id=\"header\">
                <div class=\"top\">
                    ";
        // line 27
        $this->displayBlock('navigation', $context, $blocks);
        // line 30
        echo "                </div>
                <hgroup>
                    <h2>";
        // line 32
        $this->displayBlock('blog_title', $context, $blocks);
        echo "</h2>
                    <h3>";
        // line 33
        $this->displayBlock('blog_tagline', $context, $blocks);
        echo "</h3>
                </hgroup>
            </header>

            <section class=\"main-col\">
                ";
        // line 38
        $this->displayBlock('body', $context, $blocks);
        // line 39
        echo "            </section>
            <aside class=\"sidebar\">
                ";
        // line 41
        $this->displayBlock('sidebar', $context, $blocks);
        // line 42
        echo "            </aside>

            <div id=\"footer\">
                ";
        // line 45
        $this->displayBlock('footer', $context, $blocks);
        // line 48
        echo "            </div>
        </section>

        ";
        // line 51
        $this->displayBlock('javascripts', $context, $blocks);
        // line 68
        echo "    </body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "symblog";
    }

    // line 9
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 10
        echo "        <link href='http://fonts.googleapis.com/css?family=Irish+Grover' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
";
        // line 12
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "b41c622_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b41c622_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/blogger_part_1_blog_1.css");
            // line 15
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" media=\"screen\" />
";
            // asset "b41c622_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b41c622_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/blogger_part_1_screen_2.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" media=\"screen\" />
";
            // asset "b41c622_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b41c622_2") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/blogger_part_1_sidebar_3.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" media=\"screen\" />
";
        } else {
            // asset "b41c622"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b41c622") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/blogger.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" media=\"screen\" />
";
        }
        unset($context["asset_url"]);
        // line 17
        echo "
   ";
    }

    // line 27
    public function block_navigation($context, array $blocks = array())
    {
        // line 28
        echo "                        ";
        $this->env->loadTemplate("::menu.html.twig")->display($context);
        // line 29
        echo "                    ";
    }

    // line 32
    public function block_blog_title($context, array $blocks = array())
    {
        echo "<a href=\"";
        echo $this->env->getExtension('routing')->getPath("BloggerBlogBundle_homepage");
        echo "\">symblog</a>";
    }

    // line 33
    public function block_blog_tagline($context, array $blocks = array())
    {
        echo "<a href=\"";
        echo $this->env->getExtension('routing')->getPath("BloggerBlogBundle_homepage");
        echo "\">creating a blog in Symfony2</a>";
    }

    // line 38
    public function block_body($context, array $blocks = array())
    {
    }

    // line 41
    public function block_sidebar($context, array $blocks = array())
    {
    }

    // line 45
    public function block_footer($context, array $blocks = array())
    {
        // line 46
        echo "                Symfony2 blog tutorial - created by <a href=\"https://github.com/kuldipem\">KULDIP PIPALIYA</a>
                ";
    }

    // line 51
    public function block_javascripts($context, array $blocks = array())
    {
        // line 52
        echo "
    ";
        // line 53
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "3c62cfd_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3c62cfd_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/3c62cfd_part_1_jquery-1.10.2_1.js");
            // line 54
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "3c62cfd_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3c62cfd_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/3c62cfd_part_1_jquery.lazy_2.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "3c62cfd"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3c62cfd") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/3c62cfd.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 56
        echo "
        <script>
            \$(document).ready(function() {
                \$(\".lazy\").lazy({
                    threshold: 0,
                    effect: \"fadeIn\",
                    effectTime: 1500
                });
            });
        </script>

";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  223 => 56,  203 => 54,  199 => 53,  196 => 52,  193 => 51,  188 => 46,  185 => 45,  180 => 41,  175 => 38,  167 => 33,  159 => 32,  155 => 29,  152 => 28,  149 => 27,  144 => 17,  118 => 15,  114 => 12,  110 => 10,  107 => 9,  101 => 5,  96 => 68,  94 => 51,  89 => 48,  87 => 45,  82 => 42,  76 => 39,  66 => 33,  62 => 32,  58 => 30,  46 => 20,  34 => 5,  28 => 1,  43 => 19,  40 => 11,  104 => 26,  95 => 23,  86 => 19,  80 => 41,  74 => 38,  67 => 13,  63 => 12,  56 => 27,  48 => 7,  41 => 9,  38 => 4,  32 => 4,  29 => 3,);
    }
}
