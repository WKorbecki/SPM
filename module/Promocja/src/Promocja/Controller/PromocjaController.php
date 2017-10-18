<?php

namespace Promocja\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Promocja\Model\Promocja;
use Promocja\Model\ProduktPromocja;
use Produkt\Model\Produkt;

class PromocjaController extends AbstractActionController
{
    protected $promocjaTable;
    protected $produktpromocjaTable;
    protected $produktTable;


    public function listaAction()
    {
        $this->layout()->page = 3;
        $promocje = $this->PromocjaTabela()->wszystko();
        $produktypromocje = $this->ProduktPromocjaTabela()->wszystko();
        $produkty = $this->ProduktTabela()->wszystko();
        $wynik = Array();
        
        $request = $this->getRequest();
        if ($request->isPost())
        {
            switch ($_POST['wyszukaj_po'])
            {
            case 'produkt':
                $produkty = $this->ProduktTabela()->wszystko(array(strtolower('nazwa_produktu') => strtolower($_POST['szukaj'])));
                break;
            case 'ważna od':
                $promocje = $this->PromocjaTabela()->wszystko(array( 'obowiazuje_od' => date_format(date_create($_POST['szukaj']), 'Y-m-d'), ));
                break;
            case 'ważna do':
                $promocje = $this->PromocjaTabela()->wszystko(array( 'obowiazuje_do' => date_format(date_create($_POST['szukaj']), 'Y-m-d'), ));
                break;
            case 'typ promocji':
                $promocje = $this->PromocjaTabela()->wszystko(array(strtolower('typ') => strtolower($_POST['szukaj'])));
                break;
            }
        }
        
        foreach ($produktypromocje as $produktpromocja)
        {
            foreach ($promocje as $promocja)
            {
                foreach ($produkty as $produkt)
                {
                    if ($produktpromocja->id_produktu == $produkt->id_produktu && $produktpromocja->id_promocja == $promocja->id_promocja)
                        $wynik[] = array(
                            'id_promocja'=>$promocja->id_promocja,
                            'produkt'=>$produkt->nazwa_produktu,
                            'typ'=>$promocja->typ,
                            'obowiazuje_od'=>$promocja->obowiazuje_od,
                            'obowiazuje_do'=>$promocja->obowiazuje_do,
                            'regula'=>$promocja->regula,
                            );
                }
            }
        }
        
        return new ViewModel(array('promocje' => $wynik,));
    }
    
    public function wyswietlAction()
    {
        return new ViewModel();
    }
    
    public function dodajAction()
    {
        $this->layout()->page = 3;
        return new ViewModel();
    }
    
    public function edytujAction()
    {
        $this->layout()->page = 3;
        return new ViewModel();
    }
    
    public function usunAction()
    {
        return new ViewModel();
    }
    
    public function PromocjaTabela()
    {
        if (!$this->promocjaTable)
        {
            $sm = $this->getServiceLocator();
            $this->promocjaTable = $sm->get('Promocja\Model\PromocjaTable');
        }
        
        return $this->promocjaTable;
    }
    
    public function ProduktPromocjaTabela()
    {
        if (!$this->produktpromocjaTable)
        {
            $sm = $this->getServiceLocator();
            $this->produktpromocjaTable = $sm->get('Promocja\Model\ProduktPromocjaTable');
        }
        
        return $this->produktpromocjaTable;
    }
    
    public function ProduktTabela()
    {
        if (!$this->produktTable)
        {
            $sm = $this->getServiceLocator();
            $this->produktTable = $sm->get('Produkt\Model\ProduktTable');
        }
        
        return $this->produktTable;
    }
}
