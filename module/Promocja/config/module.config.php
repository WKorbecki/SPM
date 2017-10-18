<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Promocja\Controller\Promocja' => 'Promocja\Controller\PromocjaController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'promocja' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/promocja[/:action][/:id][/]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Promocja\Controller\Promocja',
                        'action' => 'lista',
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