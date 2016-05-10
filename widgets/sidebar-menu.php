<?php

return [

    'name' => 'system/menu',

    'label' => 'Sidebar Menu',

    'defaults' => [
        'start_level' => 1,
        'depth' => 0,
        'mode' => 'all'
    ],

    'render' => function ($widget) use ($app) {
        return $app->view()->menu()->render($widget->get('menu'), 'theme:views/widgets/sidebar-menu.php', [
            'start_level' => (int) $widget->get('start_level'),
            'depth' => $widget->get('depth'),
            'mode' => $widget->get('mode'),
            'widget' => $widget
        ]);
    },

    'events' => [

        'view.scripts' => function ($event, $scripts) {
            $scripts->register('theme-stc-widget-menu', 'theme:app/bundle/sidebar-menu.js', ['~widgets']);
        }

    ]

];
