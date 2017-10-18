<?php

namespace Produkt\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Produkt\Model\Oferta;
use Produkt\Model\Produkt;

class OfertaController extends AbstractActionController
{
    protected $ofertaTable;
    protected $produktTable;
   
    
    public function listaAction()
    {
        $this->layout()->page = 2;
        $request = $this->getRequest();
        if ($request->isPost())
        {
            switch ($_POST['wyszukaj_po'])
            {
            case 'produkt':
                $produkty = $this->TabelaProdukt()->wszystko(array(strtolower('nazwa_produktu') => strtolower($_POST['szukaj'])));
                $oferty = $this->TabelaOferta()->wszystko();
                break;
            case 'data rozpoczęcia':
                $produkty = $this->TabelaProdukt()->wszystko();
                $oferty = $this->TabelaOferta()->wszystko(array('oferta_obo_od' => date_format(date_create($_POST['szukaj']), 'Y-m-d'),));
                break;
            case 'data zakończenia':
                $produkty = $this->TabelaProdukt()->wszystko();
                $oferty = $this->TabelaOferta()->wszystko(array('oferta_obo_do' => date_format(date_create($_POST['szukaj']), 'Y-m-d')));
                break;
            default :
                $produkty = $this->TabelaProdukt()->wszystko();
                $oferty = $this->TabelaOferta()->wszystko();
                break;
            }
        }
        else
        {
            $produkty = $this->TabelaProdukt()->wszystko();
            $oferty = $this->TabelaOferta()->wszystko();
        }
        
        //$oferty = $this->TabelaOferta()->wszystko();
        //$produkty = $this->TabelaProdukt()->wszystko();
        $nazwy = Array();
        $tabela = Array();
        
        foreach($oferty as $oferta)
        {
            foreach($produkty as $produkt)
            {
                if($oferta->id_produktu==$produkt->id_produktu)
                {
                    //$nazwy[]=$produkt->nazwa_produktu;
                    $tabela[] = array(
                        'id_oferta' => $oferta->id_oferta,
                        'produkt' => $produkt->nazwa_produktu,
                        'ilosc' => $oferta->ilosc,
                        'oferta_obo_od' => $oferta->oferta_obo_od,
                        'oferta_obo_do' => $oferta->oferta_obo_do,
                        );
                }
            }
        }
        //return new ViewModel(array('okazje' => $oferty, 'nazwy' => $nazwy));
        return new ViewModel(array('okazje' => $tabela,));
    }
    
    public function dodajAction()
    {
        $this->layout()->page = 2;
        return new ViewModel();
    }
    
    public function edytujAction()
    {
        $this->layout()->page = 2;
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
    
    public function TabelaOferta()
    {
        if (!$this->ofertaTable)
        {
            $sm = $this->getServiceLocator();
            $this->ofertaTable = $sm->get('Produkt\Model\OfertaTable');
        }
        
        return $this->ofertaTable;
    }
    
    public function TabelaProdukt()
    {
        if (!$this->produktTable)
        {
            $sm = $this->getServiceLocator();
            $this->produktTable = $sm->get('Produkt\Model\ProduktTable');
        }
        
        return $this->produktTable;
    }
    
}
