<?php

namespace Produkt;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Produkt\Model\Produkt;
use Produkt\Model\ProduktTable;
use Produkt\Model\Oferta;
use Produkt\Model\OfertaTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface, ServiceProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Produkt\Model\ProduktTable' => function($sm) {
                    $tableGateway = $sm->get('ProduktTableGateway');
                    $table = new ProduktTable($tableGateway);
                    return $table;
                },
                'ProduktTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Produkt());
                    return new TableGateway('PRODUKTY', $dbAdapter, null, $resultSetPrototype);
                },
                'Produkt\Model\OfertaTable' => function($sm) {
                    $tableGateway = $sm->get('OfertaTableGateway');
                    $table = new OfertaTable($tableGateway);
                    return $table;
                },
                'OfertaTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Oferta());
                    return new TableGateway('OFERTA', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
}
