<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/css/blogger')) {
            // _assetic_b41c622
            if ($pathinfo === '/css/blogger.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'b41c622',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_b41c622',);
            }

            if (0 === strpos($pathinfo, '/css/blogger_part_1_')) {
                // _assetic_b41c622_0
                if ($pathinfo === '/css/blogger_part_1_blog_1.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'b41c622',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_b41c622_0',);
                }

                if (0 === strpos($pathinfo, '/css/blogger_part_1_s')) {
                    // _assetic_b41c622_1
                    if ($pathinfo === '/css/blogger_part_1_screen_2.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'b41c622',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_b41c622_1',);
                    }

                    // _assetic_b41c622_2
                    if ($pathinfo === '/css/blogger_part_1_sidebar_3.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'b41c622',  'pos' => 2,  '_format' => 'css',  '_route' => '_assetic_b41c622_2',);
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/js/3c62cfd')) {
            // _assetic_3c62cfd
            if ($pathinfo === '/js/3c62cfd.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '3c62cfd',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_3c62cfd',);
            }

            if (0 === strpos($pathinfo, '/js/3c62cfd_part_1_jquery')) {
                // _assetic_3c62cfd_0
                if ($pathinfo === '/js/3c62cfd_part_1_jquery-1.10.2_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '3c62cfd',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_3c62cfd_0',);
                }

                // _assetic_3c62cfd_1
                if ($pathinfo === '/js/3c62cfd_part_1_jquery.lazy_2.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '3c62cfd',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_3c62cfd_1',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/task')) {
            // BloggerTaskBundle_task
            if ($pathinfo === '/task') {
                return array (  '_controller' => 'Blogger\\TaskBundle\\Controller\\TaskController::newAction',  '_route' => 'BloggerTaskBundle_task',);
            }

            // BloggerTaskBundle_task_success
            if ($pathinfo === '/task') {
                return array (  '_controller' => 'Blogger\\TaskBundle\\Controller\\TaskController::newAction',  '_route' => 'BloggerTaskBundle_task_success',);
            }

        }

        // BloggerUserBundle_user
        if ($pathinfo === '/user') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_BloggerUserBundle_user;
            }

            return array (  '_controller' => 'Blogger\\UserBundle\\Controller\\UserController::indexAction',  '_route' => 'BloggerUserBundle_user',);
        }
        not_BloggerUserBundle_user:

        // register
        if ($pathinfo === '/register') {
            return array (  '_controller' => 'Blogger\\UserBundle\\Controller\\UserController::registerAction',  '_route' => 'register',);
        }

        // handle_register
        if ($pathinfo === '/handle_register') {
            return array (  '_controller' => 'Blogger\\UserBundle\\Controller\\UserController::handleRegisterAction',  '_route' => 'handle_register',);
        }

        // BloggerBlogBundle_advance_search
        if ($pathinfo === '/advanceSearch') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_BloggerBlogBundle_advance_search;
            }

            return array (  '_controller' => 'Blogger\\BlogBundle\\Controller\\SearchController::AdvanceSearchAction',  '_route' => 'BloggerBlogBundle_advance_search',);
        }
        not_BloggerBlogBundle_advance_search:

        // BloggerBlogBundle_search_search
        if ($pathinfo === '/search') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_BloggerBlogBundle_search_search;
            }

            return array (  '_controller' => 'Blogger\\BlogBundle\\Controller\\SearchController::searchAction',  '_route' => 'BloggerBlogBundle_search_search',);
        }
        not_BloggerBlogBundle_search_search:

        // BloggerBlogBundle_blog_tag_filter
        if (0 === strpos($pathinfo, '/blog/tag') && preg_match('#^/blog/tag/(?P<tag>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_BloggerBlogBundle_blog_tag_filter;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'BloggerBlogBundle_blog_tag_filter')), array (  '_controller' => 'Blogger\\BlogBundle\\Controller\\BlogController::tagFilterAction',));
        }
        not_BloggerBlogBundle_blog_tag_filter:

        // BloggerBlogBundle_blog_create
        if (preg_match('#^/(?P<id>\\d+)/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_BloggerBlogBundle_blog_create;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'BloggerBlogBundle_blog_create')), array (  '_controller' => 'Blogger\\BlogBundle\\Controller\\BlogController::showAction',));
        }
        not_BloggerBlogBundle_blog_create:

        // BloggerBlogBundle_blog_show
        if (preg_match('#^/(?P<id>\\d+)/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_BloggerBlogBundle_blog_show;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'BloggerBlogBundle_blog_show')), array (  '_controller' => 'Blogger\\BlogBundle\\Controller\\BlogController::showAction',));
        }
        not_BloggerBlogBundle_blog_show:

        // BloggerBlogBundle_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_BloggerBlogBundle_homepage;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'BloggerBlogBundle_homepage');
            }

            return array (  '_controller' => 'Blogger\\BlogBundle\\Controller\\PageController::indexAction',  '_route' => 'BloggerBlogBundle_homepage',);
        }
        not_BloggerBlogBundle_homepage:

        // BloggerBlogBundle_about
        if ($pathinfo === '/about') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_BloggerBlogBundle_about;
            }

            return array (  '_controller' => 'Blogger\\BlogBundle\\Controller\\PageController::aboutAction',  '_route' => 'BloggerBlogBundle_about',);
        }
        not_BloggerBlogBundle_about:

        // BloggerBlogBundle_contact
        if ($pathinfo === '/contact') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_BloggerBlogBundle_contact;
            }

            return array (  '_controller' => 'Blogger\\BlogBundle\\Controller\\PageController::contactAction',  '_route' => 'BloggerBlogBundle_contact',);
        }
        not_BloggerBlogBundle_contact:

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'Blogger\\UserBundle\\Controller\\UserController::loginAction',  '_route' => 'login',);
                }

                // login_check
                if ($pathinfo === '/login_check') {
                    return array('_route' => 'login_check');
                }

            }

            // logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'logout');
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
