<?php

namespace Produkt\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Produkt\Model\Produkt;

class ProduktController extends AbstractActionController
{
    protected $produktTable;
    public $produkt_id;


    public function listaAction()
    {
        $this->layout()->page = 1;
        $request = $this->getRequest();
        if ($request->isPost())
        {
            switch ($_POST['wyszukaj_po'])
            {
            case 'nazwa':
                $produkty = $this->Tabela()->wszystko(array(strtolower('nazwa_produktu') => strtolower($_POST['szukaj']),));
                break;
            case 'opis':
                //$produkty = $this->Tabela()->wszystko()->like('opis',$_POST['szukaj']);
                $produkty = $this->Tabela()->wszystko(array('opis' => strtolower($_POST['szukaj']),));
                //$produkty = $this->Tabela()->wszystko(new \Zend\Db\Sql\Predicate\Like('opis',$_POST['szukaj']));
                break;
            default :
                $produkty = $this->Tabela()->wszystko(NULL);
                break;
            }
        }
        else
        {
            $produkty = $this->Tabela()->wszystko(null);
        }
        
        return new ViewModel(array(
            'produkty' => $produkty,
            'xxx' => $produkty->Count()));
    }
    
    public function dodajAction()
    {
        $this->layout()->page = 1;
        $request = $this->getRequest();
        if ($request->isPost())
        {
            if (!empty($_POST['Nazwa']) && !empty($_POST['Cena']) && isset($_FILES['Zdjecie']) && $_FILES['Zdjecie']['size'] > 0)
            {
                $tmpName = $_FILES['Zdjecie']['tmp_name'];
                $file = fopen($tmpName, 'r');
                $image = fread($file, filesize($tmpName));
                fclose($file);
                $data = array(
                        'id_produktu' => "",
                        'nazwa_produktu' => addslashes( htmlspecialchars( $_POST['Nazwa'] ) ),
                        'opis' => addslashes( htmlspecialchars( $_POST['Opis'] ) ),
                        'zdjecie' => $image ,
                        'cena_jednostkowa' => (int) $_POST['Cena'] ,
                        'tagi' => addslashes( htmlspecialchars( $_POST['Tagi'] ) ),
                        'zamienniki' => addslashes( htmlspecialchars( $_POST['Zamienniki'] ) ),
                    );
                $produkt = new Produkt();
                $produkt->exchangeArray($data);
                $this->Tabela()->dodaj($produkt);
                return $this->redirect()->toRoute('produkt');
            }
        }
        //$image = base64_encode($image);
        return new ViewModel();
    }
    
    public function edytujAction()
    {
        $this->layout()->page = 1;
        $id = $this->params('id',0);
        if (!$id)
            throw new \Exception('Nie podano id produktu');
        
        $request = $this->getRequest();
        if (!$request->isPost())
        {
            $produkty = $this->Tabela()->wszystko(array('id_produktu' => $id));

            if ($produkty->Count() == 0)
                return $this->redirect()->toRoute('produkt');

            $edytuj_produkt = new Produkt();

            foreach ($produkty as $produkt)
            {
                $edytuj_produkt->exchangeArray(
                            array(
                                'id_produktu' => $produkt->id_produktu,
                                'nazwa_produktu' => $produkt->nazwa_produktu,
                                'opis' => $produkt->opis,
                                'zdjecie' => $produkt->zdjecie,
                                'cena_jednostkowa' => $produkt->cena_jednostkowa,
                                'tagi' => $produkt->tagi,
                                'zamienniki' => $produkt->zamienniki,
                            )
                        );
            }
            return new ViewModel(array('produkt' => $edytuj_produkt,));
        }
        else
        {
            $data = array(
                'id_produktu' => $id,
                'nazwa_produktu' => addslashes( htmlspecialchars( $_POST['Nazwa'] ) ),
                'opis' => addslashes( htmlspecialchars( $_POST['Opis'] ) ),
                'zdjecie' => addslashes( htmlspecialchars( $_POST['Zdjecie'] ) ),
                'cena_jednostkowa' => (int) $_POST['Cena'] ,
                'tagi' => addslashes( htmlspecialchars( $_POST['Tagi'] ) ),
                'zamienniki' => addslashes( htmlspecialchars( $_POST['Zamienniki'] ) ),
            );
            if (!empty($_POST['Nazwa']) && !empty($_POST['Cena']))
            {
                $produkt = new Produkt();
                $produkt->exchangeArray($data);
                $this->Tabela()->edytuj($produkt,$id);
                return $this->redirect()->toRoute('produkt');
            }
        }
    }
    
    public function usunAction()
    {
        $id = $this->params('id',0);
        
        if (!$id)
            throw new \Exception('Nie podano id produktu');
        
        $produkty = $this->Tabela()->wszystko(array('id_produktu' => $id));

        if ($produkty->Count() == 0)
            throw new \Exception('Produkt o takim id nie istnieje.');
        
        $this->Tabela()->usun($id);
        return $this->redirect()->toRoute('produkt');
    }
    
    public function wyszukajAction()
    {
        return new ViewModel();
    }
    
    public function Tabela()
    {
        if (!$this->produktTable)
        {
            $sm = $this->getServiceLocator();
            $this->produktTable = $sm->get('Produkt\Model\ProduktTable');
        }
        
        return $this->produktTable;
    }
}
