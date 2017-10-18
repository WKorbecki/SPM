<?php

namespace Promocja\Model;

use Zend\Db\TableGateway\TableGateway;

class ProduktPromocjaTable
{
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    
    public function wszystko($tablica = array())
    {
        $wynik = $this->tableGateway->select($tablica);
        return $wynik;
    }
    
    public function dodaj(ProduktPromocja $produkt_promocja)
    {
        $data = array(
            'id_produkty_promocje' => $produkt_promocja->id_produkty_promocje,
            'id_produktu' => $produkt_promocja->id_produktu,
            'id_promocja' => $produkt_promocja->id_promocja,
        );
        
        $this->tableGateway->insert($data);
    }
    
    public function edytuj(ProduktPromocja $oferta)
    {
        $data = array(
            'id_produkty_promocje' => $produkt_promocja->id_produkty_promocje,
            'id_produktu' => $produkt_promocja->id_produktu,
            'id_promocja' => $produkt_promocja->id_promocja,
        );
        
        $this->tableGateway->update($data);
    }
    
    public function usun($id_produkty_promocje)
    {
        $this->tableGateway->delete(array('id_produkty_promocje' => (int) $id_produkty_promocje));
    }
}
