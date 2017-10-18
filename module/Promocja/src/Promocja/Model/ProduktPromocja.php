<?php

namespace Promocja\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class ProduktPromocja
{
    public $id_produkty_promocje; //int
    public $id_produktu; //int
    public $id_promocja; //int
    
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->id_produkty_promocje = (!empty($data['id_produkty_promocje'])) ? $data['id_produkty_promocje'] : null;
        $this->id_produktu = (!empty($data['id_produktu'])) ? $data['id_produktu'] : null;
        $this->id_promocja = (!empty($data['id_promocja'])) ? $data['id_promocja'] : null;
    }
    
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }
    
    public function getInputFilter()
    {
        if(!$this->inputFilter)
        {
            $inputFilter = new InputFilter();
            
            $inputFilter->add(array(
                'name' => 'id_produkty_promocje',
                'requird' => true,
                'filtres' => array(
                    array(
                        'name' => 'Int',
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name' => 'id_produktu',
                'requird' => true,
                'filtres' => array(
                    array(
                        'name' => 'Int',
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name' => 'id_promocja',
                'requird' => true,
                'filtres' => array(
                    array(
                        'name' => 'Int',
                    ),
                ),
            ));
            
            $this->inputFilter = $inputFilter;
        }
        
        return $this->inputFilter;
    }
}
