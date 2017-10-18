<?php

namespace Produkt\Model;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Produkt
{
    public $id_produktu; //int
    public $nazwa_produktu; //text
    public $opis; //text
    public $zdjecie; //text
    public $cena_jednostkowa; //int
    public $tagi; //text
    public $zamienniki; //text
    
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->id_produktu = (!empty($data['id_produktu'])) ? $data['id_produktu'] : null;
        $this->nazwa_produktu = (!empty($data['nazwa_produktu'])) ? $data['nazwa_produktu'] : null;
        $this->opis = (!empty($data['opis'])) ? $data['opis'] : null;
        $this->zdjecie = (!empty($data['zdjecie'])) ? $data['zdjecie'] : null;
        $this->cena_jednostkowa = (!empty($data['cena_jednostkowa'])) ? $data['cena_jednostkowa'] : null;
        $this->tagi = (!empty($data['tagi'])) ? $data['tagi'] : null;
        $this->zamienniki = (!empty($data['zamienniki'])) ? $data['zamienniki'] : null;
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
                'name' => 'id_produktu',
                'requird' => true,
                'filtres' => array(
                    array(
                        'name' => 'Int',
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name' => 'nazwa_produktu',
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
                'name' => 'opis',
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
                'name' => 'zdjecie',
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
                             'encoding' => 'ASCII',
                         ),
                     ),
                 ),
            ));
            
            $inputFilter->add(array(
                'name' => 'cena_jednostkowa',
                'requird' => true,
                'filtres' => array(
                    array(
                        'name' => 'Digits',
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name' => 'tagi',
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
                'name' => 'zamienniki',
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
