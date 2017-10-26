<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthController extends Controller {

    public function checkTokenAction(Request $request) {
        $auth = $this->get('app.jwt_auth.service');
        $autho = $request->query->get('token');
        $response = $this->get("error.service");
        $authcheck = $auth->checkToken($autho);
        
        if ($authcheck == true) {

            return new JsonResponse($response->success());
        } else {

            return new JsonResponse($response->tokenError());
        }
    }
    
    private function checkUser($user){
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("EntityBundle:Registro")->find($user);
        if(count($user)>0)
            return true;
        return false;
                
    }

    public function loginAction(Request $request) {

        $jwcAuth = $this->get("app.jwt_auth.service");
        $response = $this->get("error.service");
        
         
        $json = json_decode($request->get('json'));
        
        $user = $jwcAuth->authUserService($json->user);


            if ($user == null) {

                return new JsonResponse(array($response->loginError()));
            }

            if ($this->get('security.password_encoder')->isPasswordValid($user, $json->password)) {
                $signup = $jwcAuth->signup($user);

                if ($signup != null)
                    return new JsonResponse($signup);
            } 
            return new JsonResponse($response->loginError());
       
    }
    
    
  

}
