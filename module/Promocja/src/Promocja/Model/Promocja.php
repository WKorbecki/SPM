<?php

namespace Promocja\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Promocja
{
    public $id_promocja; //int
    public $typ; //text
    public $obowiazuje_od; //date
    public $obowiazuje_do; //date
    public $regula; //text
    
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->id_promocja = (!empty($data['id_promocja'])) ? $data['id_promocja'] : null;
        $this->typ = (!empty($data['typ'])) ? $data['typ'] : null;
        $this->obowiazuje_od = (!empty($data['obowiazuje_od'])) ? $data['obowiazuje_od'] : null;
        $this->obowiazuje_do = (!empty($data['obowiazuje_do'])) ? $data['obowiazuje_do'] : null;
        $this->regula = (!empty($data['regula'])) ? $data['regula'] : null;
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
                'name' => 'id_promocja',
                'requird' => true,
                'filtres' => array(
                    array(
                        'name' => 'Int',
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name' => 'typ',
                'requird' => true,
                'filtres' => array(
                    array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                ),
                'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                         ),
                     ),
                 ),
            ));
            
            $inputFilter->add(array(
                'name' => 'obowiazuje_od',
                'requird' => true,
                'filtres' => array(
                    array(
                        'name' => 'DateTimeFormatter',
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name' => 'obowiazuje_do',
                'requird' => true,
                'filtres' => array(
                    array(
                        'name' => 'DateTimeFormatter',
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name' => 'regula',
                'requird' => true,
                'filtres' => array(
                    array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                ),
                'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                         ),
                     ),
                 ),
            ));
            
            $this->inputFilter = $inputFilter;
        }
        
        return $this->inputFilter;
    }
}
