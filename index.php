<?php

use Pagekit\Site\MenuHelper;

/**
 * Configuration
 */
return [

    /**
     * Unique name that identifies your theme.
     */
    'name' => 'theme-stc',

    /**
     * Define menu positions.
     * Will be listed in the backend so that users
     * can assign menus to these positions.
     */
    'menus' => [

        'main' => 'Main',
        'footer' => 'Footer',
        'sidebar' => 'Sidebar'

    ],

    /**
     * Define widget positions.
     * will be listed in the backend so that users
     * can publish widgets in these positions.
     */
    'positions' => [

        'homepage' => 'Homepage',
        'sidebar' => 'Sidebar',

    ],

    'nodes' => [

        'cast-study' => [
            'name' => '@case-study',
            'label' => 'Case Study',
            'controller' => 'CaseStudyController::indexAction'
        ]

    ],

    /**
     * Node defaults
     */
    'node' => [

        'stc_title_hide' => true,
        'stc_page_id' => '',

    ],

    'routes' => [

        '/api/site/menu' => [
            'name' => '@site/api/menu',
            'controller' => 'Pagekit\\Site\\Controller\\MenuApiController'
        ],

    ],

    /**
     * Custom Widgets
     */
     'widgets' => [

        'widgets/sidebar-menu.php'

     ],

    /**
     * Widget defaults
     */
    'widget' => [

        'title_hide' => true,
        'html_class' => ''

    ],

    'events' => [

        'view.system/site/admin/settings' => function ($event, $view) use ($app) {
            $view->script('site-theme', 'theme:app/bundle/site-theme.js', 'site-settings');
            $view->data('$theme', $this);
        },

        'view.system/site/admin/edit' => function ($event, $view) {
            $view->script('node-theme', 'theme:app/bundle/node-theme.js', 'site-edit');
        },

        'view.system/widget/edit' => function ($event, $view) {
            $view->script('widget-theme', 'theme:app/bundle/widget-theme.js', 'widget-edit');
        },

        'view.scripts' => function ($event, $scripts) {
            $scripts->register('dashboard-theme', 'theme:app/bundle/dashboard.js', '~dashboard');
        },

    ],

    /**
     * Define theme configuration.
     * This is the theme's default configuration. During run-time, they will be merged with
     * settings the user has set in the backend. The default configuration can therefore
     * be overwritten.
     */
    'config' => []

];
