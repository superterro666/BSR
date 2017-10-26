<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Services;
use Symfony\Component\HttpFoundation\RequestStack;

class MailingService {
   private $mailer;
   
   
   
   
   public function __construct($mailer) {
       $this->mailer = $mailer;
       
       
   }
   
   public function sendMessage($email,$password){
       
      
       $message = $this->mailer->createMessage();
       $message->setSubject("Administrador");
       $message->setBody("Claves ".$password." User ".$email ,"text/html");
       $message->setFrom($email);
       $message->setTo($email);
       $result  = $this->mailer->send($message);
     
     return $result;
      
        
       
       
   }
}
