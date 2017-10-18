<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Produkt\Controller\Produkt' => 'Produkt\Controller\ProduktController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'produkt' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/produkt[/:action]/[:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Produkt\Controller\Produkt',
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