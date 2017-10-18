<?php

namespace Promocja\Model;

use Zend\Db\TableGateway\TableGateway;

class PromocjaTable
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
    
    public function dodaj(Promocja $promocja)
    {
        $data = array(
            //'' => $promocja->,
            'id_promocja' => $promocja->id_promocja,
            'typ' => $promocja->typ,
            'obowiazuje_od' => $promocja->obowiazuje_od,
            'obowiazuje_do' => $promocja->obowiazuje_do,
            'regula' => $promocja->regula,
        );
        
        $this->tableGateway->insert($data);
    }
    
    public function edytuj(Promocja $oferta)
    {
        $data = array(
            //'' => $promocja->,
            'id_promocja' => $promocja->id_promocja,
            'typ' => $promocja->typ,
            'obowiazuje_od' => $promocja->obowiazuje_od,
            'obowiazuje_do' => $promocja->obowiazuje_do,
            'regula' => $promocja->regula,
        );
        
        $this->tableGateway->update($data);
    }
    
    public function usun($id_promocja)
    {
        $this->tableGateway->delete(array('id_promocja' => (int) $id_promocja));
    }
}
