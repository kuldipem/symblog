<?php

/* @WebProfiler/Profiler/base_js.html.twig */
class __TwigTemplate_e67060d4d8580f8ec9c81b0679fb68e069c7770b98089f93885e98324544dbe3 extends Twig_Template
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
        echo "<script>/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},

            profilerStorageKey = 'sf2/profiler/',

            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 === xhr.readyState && 200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else if (4 === xhr.readyState && xhr.status != 200) {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },

            hasClass = function(el, klass) {
                return el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },

            removeClass = function(el, klass) {
                el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
            },

            addClass = function(el, klass) {
                if (!hasClass(el, klass)) { el.className += \" \" + klass; }
            },

            getPreference = function(name) {
                if (!window.localStorage) {
                    return null;
                }

                return localStorage.getItem(profilerStorageKey + name);
            },

            setPreference = function(name, value) {
                if (!window.localStorage) {
                    return null;
                }

                localStorage.setItem(profilerStorageKey + name, value);
            };

        return {
            hasClass: hasClass,

            removeClass: removeClass,

            addClass: addClass,

            getPreference: getPreference,

            setPreference: setPreference,

            request: request,

            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        options
                    );
                }

                return this;
            },

            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }
        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/base_js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  91 => 35,  83 => 30,  79 => 29,  75 => 28,  70 => 26,  50 => 15,  26 => 3,  24 => 2,  108 => 35,  92 => 29,  84 => 26,  78 => 23,  72 => 22,  68 => 21,  64 => 19,  59 => 18,  51 => 12,  44 => 10,  19 => 1,  57 => 12,  52 => 10,  42 => 12,  30 => 5,  27 => 7,  22 => 17,  20 => 1,  223 => 56,  203 => 54,  199 => 53,  196 => 52,  193 => 51,  188 => 46,  185 => 45,  180 => 41,  175 => 38,  167 => 33,  159 => 32,  155 => 29,  152 => 28,  149 => 27,  144 => 17,  118 => 15,  114 => 12,  110 => 10,  107 => 9,  101 => 33,  96 => 68,  94 => 51,  89 => 48,  87 => 45,  82 => 42,  76 => 39,  66 => 25,  62 => 24,  58 => 30,  46 => 14,  34 => 4,  28 => 1,  43 => 19,  40 => 11,  104 => 26,  95 => 23,  86 => 19,  80 => 41,  74 => 38,  67 => 15,  63 => 12,  56 => 27,  48 => 8,  41 => 9,  38 => 5,  32 => 6,  29 => 3,);
    }
}
