<?php

namespace AppBundle\Services;
use Symfony\Component\DependencyInjection\Container;

class GeneratePasswordService {

    private $container;
    private $longitud;
    private $fuerza;
    
     public function __construct(Container $container, $longitud, $fuerza)
    {
       
        $this->container = $container;
        $this->longitud = $longitud;
        $this->fuerza = $fuerza;
    }
    
    
    public function getEncoder($objeto){
        
         $encoder = $this->container->get('security.password_encoder');
            
         $password = $this->genetarePassword();
         $encoded = $encoder->encodePassword($objeto, $password );
         return array($encoded,$password);
       
        
    } 
    
    
    public function getEncodePassword($user, $password){
        $encoder = $this->container->get('security.password_encoder');
        $encoded = $encoder->encodePassword($user, $password );
        return $encoded;
    }
    
    
    
    

    public function genetarePassword() {
        $vocales = 'aeiouy';
        $consonantes = 'bcdfghjklmnpqrstvwxz';
        if ($this->fuerza & 1) {
            $consonantes .= 'BDGHJLMNPQRSTVWXZ';
        }
        if ($this->fuerza & 2) {
            $vocales .= "AEUY";
        }
        if ($this->fuerza & 4) {
            $consonantes .= '23456789';
        }
        if ($this->fuerza & 8) {
            $consonantes .= '@#$%';
        }

        $password = '';
        $alt = time() % 2;
        for ($i = 0; $i < $this->longitud; $i++) {
            if ($alt == 1) {
                $password .= $consonantes[(rand() % strlen($consonantes))];
                $alt = 0;
            } else {
                $password .= $vocales[(rand() % strlen($vocales))];
                $alt = 1;
            }
        }

        return $password;
    }



  public function genetarePasswordWithParams($param1, $param2) {
      
        $vocales = 'aeiouy';
        $consonantes = 'bcdfghjklmnpqrstvwxz';
        if ($param1 & 1) {
            $consonantes .= 'BDGHJLMNPQRSTVWXZ';
        }
        if ($param1 & 2) {
            $vocales .= "AEUY";
        }
        if ($param1 & 4) {
            $consonantes .= '23456789';
        }
        if ($param1 & 8) {
            $consonantes .= '@#$%';
        }

        $password = '';
        $alt = time() % 2;
        for ($i = 0; $i < $param2; $i++) {
            if ($alt == 1) {
                $password .= $consonantes[(rand() % strlen($consonantes))];
                $alt = 0;
            } else {
                $password .= $vocales[(rand() % strlen($vocales))];
                $alt = 1;
            }
        }

        return $password;
    }
    
    }


