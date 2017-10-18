<?php

namespace Statystyka\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class StatystykaController extends AbstractActionController
{
    public function indexAction()
    {
        $this->layout()->page = 5;
        return new ViewModel();
    }
    
    public function uzytkownikAction()
    {
        $this->layout()->page = 5;
        return new ViewModel();
    }
    
    public function produktAction()
    {
        $this->layout()->page = 5;
        return new ViewModel();
    }
    
    public function ofertaAction()
    {
        $this->layout()->page = 5;
        return new ViewModel();
    }
    
    public function promocjaAction()
    {
        $this->layout()->page = 5;
        return new ViewModel();
    }
}
