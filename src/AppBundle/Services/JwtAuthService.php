<?php

namespace AppBundle\Services;

use Firebase\JWT\JWT;

class JwtAuthService {

    public $manager;
    public $key;

    public function __construct($manager) {
        $this->manager = $manager;
        $this->key = "clave_secreta";
    }

    public function decodeAuthService($jwt) {
        $decoder = JWT::decode($jwt, $this->key, array("HS256"));
        return $decoder;
    }

    public function authUserService($user) {

        $user = $this->manager->getRepository("EntityBundle:Registro")->findOneBy(array("user" => $user));
        if ($user)
            return $user;
        return null;
    }

    public function signup($user) {

        $token = array(
            "iss" => "json",
            "sub" => "terro",
            "jti" => $user->getId(),
            "iat" => time(),
            "exp" => time() + (7 * 24 * 60 * 60),
            "id" => $user->getId(),
            "user" => $user->getUser(),
            "role" => $user->getRole()
        );
        
        $user = array ('id'=>$user->getSha(),'user'=>$user->getUser(), 'role'=>$user->getRole());

        $jwt = JWT::encode($token, $this->key, "HS256");

        return array('code'=>200,'user' => $user, 'token' => $jwt);
    }
    
     public function checkToken($jwt) {
       
        try {
            
         $decoded = JWT::decode($jwt, $this->key, array('HS256'));
           
        } catch (\UnexpectedValueException $e) {

            $auth = false;
            
            
        } catch (\DomainException $e) {
            
            $auth = false;
            
        }

        if (isset($decoded->sub)) {

            $auth = true;
        } else {

           
            return false;
        }

        return $auth;
    }

}
