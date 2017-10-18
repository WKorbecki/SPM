<?php

namespace Uzytkownik\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UzytkownikController extends AbstractActionController
{
    public function listaAction()
    {
        $this->layout()->page = 4;
        return new ViewModel();
    }
    
    public function dodajAction()
    {
        $this->layout()->page = 4;
        return new ViewModel();
    }
    
    public function edytujAction()
    {
        $this->layout()->page = 4;
        return new ViewModel();
    }
    
    public function usunAction()
    {
        return new ViewModel();
    }
    
    public function wyszukajAction()
    {
        return new ViewModel();
    }
}
