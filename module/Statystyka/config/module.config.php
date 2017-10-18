<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Statystyka\Controller\Statystyka' => 'Statystyka\Controller\StatystykaController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'statystyka' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/statystyka[/:action][/:id][/]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Statystyka\Controller\Statystyka',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);