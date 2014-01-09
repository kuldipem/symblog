<?php

/* SensioDistributionBundle::Configurator/layout.html.twig */
class __TwigTemplate_0a4e09a8b30b7e06ebde13ec0c73a47113dcb59bfaae7c62aed2fb22cad08249 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("TwigBundle::layout.html.twig");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sensiodistribution/webconfigurator/css/configurator.css"), "html", null, true);
        echo "\" />
";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "Web Configurator Bundle";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "    <div class=\"block\">
        ";
        // line 11
        $this->displayBlock('content', $context, $blocks);
        // line 12
        echo "    </div>
    <div class=\"version\">Symfony Standard Edition v.";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["version"]) ? $context["version"] : $this->getContext($context, "version")), "html", null, true);
        echo "</div>
";
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "SensioDistributionBundle::Configurator/layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1361 => 391,  1352 => 390,  1350 => 389,  1347 => 388,  1331 => 384,  1324 => 383,  1322 => 382,  1319 => 381,  1296 => 377,  1271 => 376,  1269 => 375,  1266 => 374,  1254 => 369,  1249 => 368,  1247 => 367,  1244 => 366,  1235 => 360,  1229 => 358,  1226 => 357,  1221 => 356,  1219 => 355,  1216 => 354,  1209 => 349,  1200 => 347,  1196 => 346,  1193 => 345,  1190 => 344,  1188 => 343,  1185 => 342,  1177 => 338,  1175 => 337,  1172 => 336,  1166 => 332,  1160 => 330,  1157 => 329,  1155 => 328,  1152 => 327,  1143 => 322,  1141 => 321,  1118 => 320,  1115 => 319,  1112 => 318,  1109 => 317,  1106 => 316,  1103 => 315,  1100 => 314,  1098 => 313,  1095 => 312,  1088 => 308,  1084 => 307,  1079 => 306,  1077 => 305,  1074 => 304,  1067 => 299,  1064 => 298,  1056 => 293,  1053 => 292,  1051 => 291,  1048 => 290,  1040 => 285,  1036 => 284,  1032 => 283,  1029 => 282,  1027 => 281,  1024 => 280,  1016 => 276,  1014 => 272,  1012 => 271,  1009 => 270,  1004 => 266,  982 => 261,  979 => 260,  976 => 259,  973 => 258,  970 => 257,  967 => 256,  964 => 255,  961 => 254,  958 => 253,  955 => 252,  952 => 251,  950 => 250,  947 => 249,  939 => 243,  936 => 242,  934 => 241,  931 => 240,  923 => 236,  920 => 235,  918 => 234,  915 => 233,  903 => 229,  900 => 228,  897 => 227,  894 => 226,  892 => 225,  889 => 224,  881 => 220,  878 => 219,  876 => 218,  873 => 217,  865 => 213,  862 => 212,  860 => 211,  857 => 210,  849 => 206,  846 => 205,  844 => 204,  841 => 203,  833 => 199,  830 => 198,  828 => 197,  825 => 196,  817 => 192,  814 => 191,  812 => 190,  809 => 189,  801 => 185,  798 => 184,  796 => 183,  793 => 182,  785 => 178,  783 => 177,  780 => 176,  772 => 172,  769 => 171,  767 => 170,  764 => 169,  756 => 165,  753 => 164,  751 => 163,  749 => 162,  746 => 161,  739 => 156,  729 => 155,  724 => 154,  721 => 153,  715 => 151,  712 => 150,  710 => 149,  707 => 148,  699 => 142,  697 => 141,  696 => 140,  695 => 139,  689 => 137,  683 => 135,  680 => 134,  666 => 126,  662 => 125,  658 => 124,  654 => 123,  649 => 122,  643 => 120,  640 => 119,  638 => 118,  635 => 117,  619 => 113,  617 => 112,  614 => 111,  598 => 107,  596 => 106,  593 => 105,  576 => 101,  564 => 99,  557 => 96,  555 => 95,  550 => 94,  529 => 92,  524 => 90,  512 => 84,  509 => 83,  503 => 81,  501 => 80,  496 => 79,  493 => 78,  490 => 77,  478 => 74,  470 => 73,  467 => 72,  464 => 71,  459 => 69,  456 => 68,  450 => 64,  442 => 62,  433 => 60,  428 => 59,  426 => 58,  414 => 52,  405 => 49,  403 => 48,  400 => 47,  390 => 43,  388 => 42,  385 => 41,  377 => 37,  366 => 33,  350 => 26,  316 => 16,  313 => 15,  311 => 14,  308 => 13,  299 => 8,  271 => 374,  266 => 366,  260 => 363,  250 => 341,  245 => 335,  225 => 298,  215 => 280,  186 => 239,  146 => 181,  129 => 148,  126 => 147,  124 => 132,  20 => 1,  349 => 323,  347 => 322,  65 => 11,  100 => 36,  462 => 202,  449 => 198,  446 => 197,  441 => 196,  439 => 195,  431 => 189,  429 => 188,  422 => 184,  415 => 180,  408 => 50,  401 => 172,  394 => 168,  373 => 156,  348 => 140,  342 => 23,  338 => 135,  335 => 21,  329 => 131,  325 => 129,  323 => 128,  320 => 127,  289 => 113,  286 => 112,  275 => 105,  270 => 102,  267 => 101,  262 => 98,  256 => 96,  233 => 304,  226 => 84,  207 => 269,  200 => 72,  181 => 232,  150 => 55,  113 => 40,  389 => 160,  386 => 159,  380 => 160,  378 => 157,  371 => 35,  367 => 155,  361 => 333,  358 => 151,  345 => 147,  343 => 146,  340 => 145,  334 => 141,  331 => 140,  328 => 139,  326 => 138,  307 => 128,  302 => 281,  296 => 121,  293 => 6,  290 => 5,  281 => 388,  276 => 381,  259 => 103,  253 => 342,  248 => 336,  232 => 88,  222 => 297,  216 => 79,  213 => 78,  210 => 270,  197 => 249,  194 => 248,  191 => 246,  184 => 233,  178 => 66,  172 => 64,  134 => 161,  127 => 35,  70 => 26,  806 => 488,  803 => 487,  792 => 485,  788 => 484,  784 => 482,  771 => 481,  745 => 476,  742 => 475,  723 => 473,  706 => 472,  702 => 470,  698 => 469,  694 => 138,  690 => 467,  686 => 466,  682 => 465,  678 => 133,  675 => 132,  673 => 462,  656 => 461,  645 => 460,  630 => 455,  625 => 453,  621 => 452,  618 => 451,  616 => 450,  602 => 449,  565 => 414,  547 => 93,  530 => 410,  527 => 91,  525 => 408,  520 => 406,  515 => 85,  244 => 136,  170 => 56,  165 => 60,  153 => 56,  90 => 27,  363 => 32,  357 => 123,  353 => 149,  351 => 141,  344 => 24,  332 => 20,  327 => 114,  324 => 113,  321 => 135,  318 => 111,  315 => 125,  306 => 107,  303 => 122,  300 => 280,  297 => 104,  291 => 102,  288 => 4,  274 => 110,  265 => 105,  263 => 365,  255 => 353,  231 => 83,  212 => 279,  202 => 266,  190 => 76,  174 => 217,  161 => 202,  53 => 11,  104 => 90,  84 => 41,  97 => 26,  81 => 40,  77 => 25,  223 => 56,  188 => 90,  185 => 66,  180 => 41,  175 => 65,  167 => 33,  155 => 47,  152 => 46,  118 => 49,  114 => 111,  110 => 10,  76 => 31,  58 => 13,  34 => 4,  480 => 75,  474 => 161,  469 => 158,  461 => 70,  457 => 153,  453 => 199,  444 => 149,  440 => 148,  437 => 61,  435 => 146,  430 => 144,  427 => 143,  423 => 57,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 164,  384 => 121,  381 => 120,  379 => 119,  374 => 36,  368 => 34,  365 => 111,  362 => 110,  360 => 109,  355 => 27,  341 => 118,  337 => 22,  322 => 101,  314 => 99,  312 => 124,  309 => 129,  305 => 95,  298 => 120,  294 => 90,  285 => 3,  283 => 115,  278 => 387,  268 => 373,  264 => 84,  258 => 354,  252 => 80,  247 => 78,  241 => 90,  229 => 85,  220 => 290,  214 => 69,  177 => 65,  169 => 210,  140 => 58,  132 => 51,  128 => 49,  107 => 9,  61 => 2,  273 => 380,  269 => 107,  254 => 92,  243 => 327,  240 => 326,  238 => 312,  235 => 311,  230 => 303,  227 => 301,  224 => 81,  221 => 77,  219 => 76,  217 => 289,  208 => 76,  204 => 267,  179 => 224,  159 => 196,  143 => 51,  135 => 53,  119 => 117,  102 => 30,  71 => 19,  67 => 16,  63 => 21,  59 => 17,  28 => 3,  201 => 92,  196 => 92,  183 => 82,  171 => 216,  166 => 209,  163 => 53,  158 => 62,  156 => 195,  151 => 188,  142 => 59,  138 => 54,  136 => 168,  121 => 131,  117 => 39,  105 => 34,  91 => 56,  62 => 14,  49 => 14,  94 => 57,  89 => 47,  85 => 23,  75 => 28,  68 => 20,  56 => 12,  87 => 26,  21 => 2,  93 => 28,  88 => 28,  78 => 24,  46 => 34,  27 => 7,  44 => 11,  31 => 3,  25 => 5,  38 => 6,  26 => 3,  24 => 2,  19 => 1,  79 => 32,  72 => 21,  69 => 13,  47 => 9,  40 => 8,  37 => 6,  22 => 2,  246 => 93,  157 => 56,  145 => 74,  139 => 169,  131 => 160,  123 => 42,  120 => 31,  115 => 43,  111 => 110,  108 => 33,  101 => 89,  98 => 29,  96 => 67,  83 => 30,  74 => 20,  66 => 12,  55 => 12,  52 => 12,  50 => 10,  43 => 12,  41 => 7,  35 => 5,  32 => 4,  29 => 3,  209 => 82,  203 => 73,  199 => 265,  193 => 51,  189 => 240,  187 => 75,  182 => 87,  176 => 223,  173 => 85,  168 => 61,  164 => 203,  162 => 59,  154 => 189,  149 => 182,  147 => 54,  144 => 176,  141 => 175,  133 => 55,  130 => 46,  125 => 51,  122 => 41,  116 => 116,  112 => 36,  109 => 105,  106 => 104,  103 => 32,  99 => 68,  95 => 34,  92 => 28,  86 => 46,  82 => 25,  80 => 29,  73 => 23,  64 => 11,  60 => 20,  57 => 39,  54 => 15,  51 => 37,  48 => 16,  45 => 9,  42 => 12,  39 => 10,  36 => 5,  33 => 4,  30 => 3,);
    }
}
