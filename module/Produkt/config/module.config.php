<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Produkt\Controller\Produkt' => 'Produkt\Controller\ProduktController',
            'Produkt\Controller\Oferta' => 'Produkt\Controller\OfertaController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'produkt' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/produkt[/:action][/:id][/]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Produkt\Controller\Produkt',
                        'action' => 'lista',
                    ),
                ),
            ),
            'lista_produktow' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/Produkty[/]',
                    'defaults' => array(
                        'controller' => 'Produkt\Controller\Produkt',
                        'action' => 'lista',
                    ),
                ),
            ),
            'dodaj_produkt' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/Dodaj-Produkt[/]',
                    'defaults' => array(
                        'controller' => 'Produkt\Controller\Produkt',
                        'action' => 'dodaj',
                    ),
                ),
            ),
            'oferta' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/oferta[/:action][/:id][/]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Produkt\Controller\Oferta',
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