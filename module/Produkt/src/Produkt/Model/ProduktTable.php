<?php

namespace Produkt\Model;

use Zend\Db\TableGateway\TableGateway;

class ProduktTable
{
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    
    public function wszystko($tablica = array())
    {
        $wynik = $this->tableGateway->select($tablica);
        $wynik->buffer();
        return $wynik;
    }
    
    public function dodaj(Produkt $produkt)
    {
        $data = array(
            'id_produktu' => $produkt->id_produktu,
            'nazwa_produktu' => $produkt->nazwa_produktu,
            'opis' => $produkt->opis,
            'zdjecie' => $produkt->zdjecie,
            'cena_jednostkowa' => $produkt->cena_jednostkowa,
            'tagi' => $produkt->tagi,
            'zamienniki' => $produkt->zamienniki,
        );
        
        $this->tableGateway->insert($data);
    }
    
    public function edytuj(Produkt $produkt,$id_produktu)
    {
        $data = array(
            'id_produktu' => $produkt->id_produktu,
            'nazwa_produktu' => $produkt->nazwa_produktu,
            'opis' => $produkt->opis,
            'zdjecie' => $produkt->zdjecie,
            'cena_jednostkowa' => $produkt->cena_jednostkowa,
            'tagi' => $produkt->tagi,
            'zamienniki' => $produkt->zamienniki,
        );
        
        $id = (int) $data->id_produktu;
        if ($this->wszystko(array('id_produktu' => $id_produktu))->Count()) {
                 $this->tableGateway->update($data,array('id_produktu' => $id_produktu));
             } else {
                 throw new \Exception('Produkt o tym id nie istnieje');
             }
        
        
    }
    
    public function usun($id_produktu)
    {
        $this->tableGateway->delete(array('id_produktu' => (int) $id_produktu));
    }
}
