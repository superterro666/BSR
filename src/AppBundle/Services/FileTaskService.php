<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Services;

use Symfony\Component\DependencyInjection\Container;

/**
 * Description of FileTaskService
 *
 * @author link4
 */
class FileTaskService {

    private $container;
   

    public function __construct(Container $container) {

        $this->container = $container;
       
    }

    public function getExtension($file, $user) {

        $ext = $file->guessExtension();

        if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {


            return $this->setImage($file,$ext,$user);
            
        } else if ($ext == 'pdf') {

            return $this->setFile($file,$ext,$user);
            
        } else {


            return null;
        }
    }

    private function setImage($file, $ext,$user) {


        $file_name = $user . time() . "." . $ext;
        $file->move("uploads/images", $file_name);
       
        return $file_name;
    }

    private function setFile($file, $ext,$user) {

        $file_name = $user . time() . "." . $ext;
        $file->move("uploads/documents", $file_name);
       
        return $file_name;
    }

}
