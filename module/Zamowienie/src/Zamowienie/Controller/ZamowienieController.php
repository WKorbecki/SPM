<?php

namespace Zamowienie\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ZamowienietController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}
