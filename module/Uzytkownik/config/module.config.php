<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Uzytkownik\Controller\Uzytkownik' => 'Uzytkownik\Controller\UzytkownikController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'uzytkownik' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/uzytkownik[/:action][/:id][/]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Uzytkownik\Controller\Uzytkownik',
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