<?php

namespace Produkt\Model;

/*use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;*/

class Oferta
{
    public $id_uzytkownika;
    public $nazwa;
    public $adres;
    public $telefon;
    public $email;
    public $login;
    public $haslo;
    
    //protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->id_uzytkownika = (!empty($data['id_uzytkownika'])) ? $data['id_uzytkownika'] : null;
        $this->nazwa = (!empty($data['nazwa'])) ? $data['nazwa'] : null;
        $this->adres = (!empty($data['adres'])) ? $data['adres'] : null;
        $this->telefon = (!empty($data['telefon'])) ? $data['telefon'] : null;
        $this->email = (!empty($data['e-mail'])) ? $data['e-mail'] : null;
        $this->login = (!empty($data['login'])) ? $data['login'] : null;
        $this->haslo = (!empty($data['haslo'])) ? $data['haslo'] : null;
        //$this-> = (!empty($data[''])) ? $data[''] : null;
    }
    
    /*public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }
    
    public function getInputFilter()
    {
        if(!$this->inputFilter)
        {
            $inputFilter = new InputFilter();
            
            $inputFilter->add(array(
                'name' => 'id',
                'requird' => true,
                'filtres' => array(
                    array(
                        'name' => 'Int',
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name' => 'name',
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
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
            ));
            
            $inputFilter->add(array(
                'name' => 'pwd',
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
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
            ));
            
            $inputFilter->add(array(
                'name' => 'access',
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
    }*/
}
