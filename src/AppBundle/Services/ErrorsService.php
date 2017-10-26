<?php
namespace AppBundle\Services;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;


class ErrorsService {

    private $container;
   

    public function __construct(Container $container) {

        $this->container = $container;
       
    }
    
    private function getCodes($id, $e = null){
        
        switch ($id){
            case 200:
                return array('status'=>'ok', 'code'=> 200 , 'message'=>'success');
                break;
            case 333:
                return array('status'=>'error','code'=>333, 'message' => 'Login error');
                break;
            case 444:
                return  array('status'=>'db_error', 'code'=>444, 'message'=> $e);
                break;
            case 555:
                return array('status'=>'token_error','code'=>555, 'message'=>'Token is not valid');
                break;
            case 777:
                return array('status' =>'data_error','code' => 777, 'message'=>json_encode($e));
                break;
            case 888:
                return array('status'=>'user_error', 'code'=> 888, 'message' => 'User '.$e.' exist in datatable');
                break;
        }
     }
    
    public function userError($e){
        return $this->getCodes(888, $e);
    }
    
    public function dbError($e){
        
        return $this->getCodes(444,$e);
    }
    public function tokenError(){
        return $this->getCodes(555);
    }
    
    public function success(){
        return $this->getCodes(200);
    }
    
    public function loginError(){
        return $this->getCodes(333);
    }
    
    public function dataError($e){
        return $this->getCodes(777, $e);
    }
    
    
    public function parseGet($request){
        $auth = $this->container->get('app.jwt_auth.service');
        
        if($auth->checkToken($request->query->get('token'))){
            
            return $request;
        }
        return false;
    }
    
     public function parsePost(Request $request){
        $auth = $this->container->get('app.jwt_auth.service')  ;
              
        if($auth->checkToken($request->get('token'))){
            
            return json_decode($request->get('json'));
        }
        return json_decode($request->get('json'));
    }
    
    
    
    
    
    
    
    
    

   
}
