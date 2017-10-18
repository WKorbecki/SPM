<?php

namespace Produkt\Model;

use Zend\Db\TableGateway\TableGateway;

class OfertaTable
{
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    
    public function wszystko($tablica = null)
    {
        $wynik = $this->tableGateway->select($tablica);
        $wynik->buffer();
        return $wynik;
    }
    
    public function dodaj(Oferta $oferta)
    {
        $data = array(
            'id_oferta' => $oferta->id_oferta,
            'id_produktu' => $oferta->id_produktu,
            'ilosc' => $oferta->ilosc,
            'oferta_obo_od' => $oferta->oferta_obo_od,
            'oferta_obo_do' => $oferta->oferta_obo_do,
        );
        
        $this->tableGateway->insert($data);
    }
    
    public function edytuj(Oferta $oferta)
    {
        $data = array(
            'id_oferta' => $oferta->id_oferta,
            'id_produktu' => $oferta->id_produktu,
            'ilosc' => $oferta->ilosc,
            'oferta_obo_od' => $oferta->oferta_obo_od,
            'oferta_obo_do' => $oferta->oferta_obo_do,
        );
        
        $this->tableGateway->update($data);
    }
    
    public function usun($id_oferta)
    {
        $this->tableGateway->delete(array('id_oferta' => (int) $id_oferta));
    }
}
