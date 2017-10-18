<?php

namespace Produkt\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Oferta
{
    public $id_oferta; //int
    public $id_produktu; //int
    public $ilosc; //int
    public $oferta_obo_od; //date
    public $oferta_obo_do; //date
    
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->id_oferta = (!empty($data['id_oferta'])) ? $data['id_oferta'] : null;
        $this->id_produktu = (!empty($data['id_produktu'])) ? $data['id_produktu'] : null;
        $this->ilosc = (!empty($data['ilosc'])) ? $data['ilosc'] : null;
        $this->oferta_obo_od = (!empty($data['oferta_obo_od'])) ? $data['oferta_obo_od'] : null;
        $this->oferta_obo_do = (!empty($data['oferta_obo_do'])) ? $data['oferta_obo_do'] : null;
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
                'name' => 'id_oferta',
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
                'name' => 'ilosc',
                'requird' => true,
                'filtres' => array(
                    array(
                        'name' => 'Int',
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name' => 'oferta_obo_od',
                'requird' => true,
                'filtres' => array(
                    array(
                        'name' => 'DateTimeFormatter',
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name' => 'oferta_obo_do',
                'requird' => true,
                'filtres' => array(
                    array(
                        'name' => 'DateTimeFormatter',
                    ),
                ),
            ));
            
            $this->inputFilter = $inputFilter;
        }
        
        return $this->inputFilter;
    }
}
