<?php

namespace Promocja;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Promocja\Model\Promocja;
use Promocja\Model\PromocjaTable;
use Promocja\Model\ProduktPromocja;
use Promocja\Model\ProduktPromocjaTable;
use Produkt\Model\Produkt;
use Produkt\Model\ProduktTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface
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
                'Promocja\Model\PromocjaTable' => function($sm) {
                    $tableGateway = $sm->get('PromocjaTableGateway');
                    $table = new PromocjaTable($tableGateway);
                    return $table;
                },
                'PromocjaTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Promocja());
                    $resultSetPrototype->buffer();
                    return new TableGateway('PROMOCJA', $dbAdapter, null, $resultSetPrototype);
                },
                'Promocja\Model\ProduktPromocjaTable' => function($sm) {
                    $tableGateway = $sm->get('ProduktPromocjaTableGateway');
                    $table = new ProduktPromocjaTable($tableGateway);
                    return $table;
                },
                'ProduktPromocjaTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new ProduktPromocja());
                    return new TableGateway('PRODUKTY_PROMOCJE', $dbAdapter, null, $resultSetPrototype);
                },
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
            ),
        );
    }
}
