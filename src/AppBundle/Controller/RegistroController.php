<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use EntityBundle\Entity\Registro;

class RegistroController extends Controller {

    public function setUserAction(Request $request) {
        $error = $this->get('error.service');
        $json = $error->parsePost($request);
        $utils = $this->get('generate.login.service');


        if ($json) {

            $exit = true;
            $exit = $json->user ?? false;
            $exit = $json->password ?? false;

            if ($exit) {

                if ($this->userExist($json->user))
                    return new JsonResponse($error->userError($json->user));




                try {
                    $em = $this->getDoctrine()->getManager();

                    $registro = new Registro();
                    $registro->setFechaRegistro(new \DateTime());
                    $registro->setPassword($utils->getEncodePassword($registro, $json->password));
                    $registro->setUser($json->user);
                    $registro->setRole('ROLE_USER');
                    $registro->setSha(hash('sha256', microtime(), false));
                    $registro->setEstado(0);
                    $registro->setStatusCode($utils->genetarePasswordWithParams(8, 255));
                    $registro->setActivateDate(new \DateTime());

                    $em->persist($registro);
                    $em->flush();

                    return new JsonResponse($error->success());
                } catch (\Doctrine\DBAL\Exception $e) {

                    return new JsonResponse($error->dbError($e->getMessage()));
                }
            }

            return new JsonResponse($error->dataError($json));
        }

        return new JsonResponse($error->tokenError());
    }

    public function updateUserAction(Request $request) {
        $error = $this->get('error.service');
        $json = $error->parsePost($request);
       
        if ($json) {
            $exit = true;
            $exit = $json->user ?? false;
           // $exit = $json->password ?? false;
            $exis = $json->sha ?? false;

            if ($exit) {

                if ($this->userExist($json->user))
                    return new JsonResponse($error->userError($json->user));


                try {
                    $em = $this->getDoctrine()->getManager();

                    $registro = $em->getRepository("EntityBundle:Registro")->findOneBy(array('sha' => $json->sha));

                    if (count($registro) > 0) {
                        $registro->setFechaRegistro($registro->getFechaRegistro());
                        $registro->setPassword($registro->getPassword());
                        $registro->setUser($json->user);
                        $registro->setRole('ROLE_USER');
                        $registro->setSha($json->sha);

                        $em->persist($registro);
                        $em->flush();

                        return new JsonResponse($error->success());
                    }

                    return new JsonResponse($error->dataError($json));
                } catch (\Doctrine\DBAL\Exception $e) {

                    return new JsonResponse($error->dbError($e->getMessage()));
                }
            }
            
             return new JsonResponse($error->dataError($json));
        }
        return new JsonResponse($error->tokenError());
    }

    public function deleteUserAction(Request $request) {
        $error = $this->get('error.service');
        if ($error->parseGet($request)) {
            $id = $request->query->get('id') ?? false;
            if ($id) {
                $em = $this->getDoctrine()->getManager();
                try {
                    $user = $em->getRepository("EntityBundle:Registro")->findOneBy(array('sha' => $id));
                    if (count($user) > 0) {

                        $user->setEstado(0);
                        $em->persist($user);
                        $em->flush();
                        return new JsonResponse($error->success());
                    }
                    return new JsonResponse($error->dataError($user));
                } catch (\Doctrine\DBAL\Exception $e) {

                    return new JsonResponse($error->dbError($e));
                }
            }
            return new JsonResponse($error->dataError($user));
        }
    }

    public function viewUserAction(Request $request) {
        $error = $this->get('error.service');
        if ($error->parseGet($request)) {
            $id = $request->query->get('id') ?? false;
            if ($id) {
                $em = $this->getDoctrine()->getManager();
                $dql = "SELECT u.user, u.sha AS id FROM EntityBundle:Registro u WHERE u.sha= :id AND u.estado= :estado";
                try {
                    $query = $em->createQuery($dql)->setParameters(array('id' => $id, 'estado' => 1));
                    $result = $query->getOneOrNullResult();
                    if (count($result) > 0)
                        return new JsonResponse($result);
                    return new JsonResponse($error->dataError($result));
                } catch (\Doctrine\DBAL\Exception $e) {
                    return new JsonResponse($error->dbError($e));
                }
            }
            return new JsonResponse($error->dataError());
        }
        return new JsonResponse($error->tokenError());
    }

    public function viewsUsersAction(Request $request) {
        $error = $this->get('error.service');
        if ($error->parseGet($request)) {
            $em = $this->getDoctrine()->getManager();
            $dql = "SELECT u.user, u.sha, u.role FROM EntityBundle:Registro u";
            try {
                $query = $em->createQuery($dql);
                $result = $query->getResult();
                if (count($result) > 0)
                    return new JsonResponse($result);
                return new JsonResponse($error->dataError());
            } catch (\Doctrine\DBAL\Exception $e) {
                return new JsonResponse($error->dbError($e));
            }
        }
        return new JsonResponse($error->tokenError());
    }

    public function activateAcountAction(Request $request) {

        $code = $request->query->get('code') ?? false;
        $id = $request->query->get('id') ?? false;

        if ($code || $id) {
            try {
                $error = $this->get('error.service');
                $em = $this->getDoctrine()->getManager();
                $registro = $em->getRepository("EntityBundle:Registro")->findOneBy(array('status_code' => $code, 'sha' => $id, 'estado' => 0));

                $fecha_actual = new \DateTime();
                $fecha_registro = $registro->getActivateDate();

                $interval = $fecha_actual->diff($fecha_registro);

                if ($interval->d < 2) {

                    $registro->setEstado('1');
                    $registro->setActivateDate(new \DateTime());
                    $registro->setStatusCode(null);
                    $em->persist($registro);
                    $em->flush();
                }


                return new JsonResponse($error->success());
            } catch (\Doctrine\DBAL\Exception $e) {
                return new JsonResponse($error->dBError($e));
            }
        }
        return new JsonResponse($error->tokenError());
    }

    private function userExist($user) {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("EntityBundle:Registro")->findOneBy(array('user' => $user));
        if (count($user) > 0)
            return true;
        return false;
    }

    public function userExistAction(Request $request) {
        $error = $this->get('error.service');
       
            $user = $request->query->get('user') ?? false;
            if ($user) {
                $em = $this->getDoctrine()->getManager();
                $user = $em->getRepository("EntityBundle:Registro")->findOneBy(array('user' => $user));
                if (count($user) > 0)
                    return new JsonResponse(true);
                return new JsonResponse(false);
            }
            return new JsonResponse($error->dataError($user));
        
        
    }

}
