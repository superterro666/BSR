<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use EntityBundle\Entity\Ejercicio;

class EjercicioController extends Controller {

    public function setEjercicioAction(Request $request) {
        $error = $this->get('error.service');
        $json = $error->parsePost($request);
        $utils = $this->get('generate.login.service');
        if ($json) {

            $nombre = $json->nombre ?? false;
            $tipo = $json->tipo ?? false;
            $max = $json->max ?? false;
            is_number($max) ?? false;

            if ($nombre || $tipo || $max) {

                try {

                    $em = $this->getDoctrine()->getManager();
                    $categoria = $em->getRepository("EntityBundle:Categoria")->find($tipo);

                    $ejercicio = new Ejercicio();
                    $ejercicio->setNombre($nombre);
                    $ejercicio->setCategoria($categoria);
                    $ejercicio->setMax($max);

                    $em->persist($ejercicio);
                    $em->flush();
                } catch (\Doctrine\DBAL\Exception $e) {
                    return new JsonResponse($error->errorDb($e));
                }
            }
            return new JsonResponse($error->dataError($json));
        }

        return new JsonResponse($error->tokenError());
    }

    public function viewEjercicioAction(Request $request) {
        $error = $this->get('error.service');
        if ($error->parseGet($request)) {
            $id = $request->query->get('id') ?? false;
            if($id){
                $em = $this->getDoctrine()->getManager();
                $ejercicio = $em->getRepository("EntityBundle:Ejercicio")->find($id);
                if(count($ejercicio)>0){
                    return new JsonResponse(array('code'=>200,'data'=>$ejercicio));
                }
                
                return new JsonResponse($error->dataError($id));
            }
            return new JsonResponse($error->dataError($id));
        }
        return new JsonResponse($error->tokenError());
    }

    public function viewsEjerciciosAction(Request $request) {
        
    }

    public function deleteEjercicioAction(Request $request) {
        
    }

    public function updateEjercicioAction(Request $request) {
        
    }

}
