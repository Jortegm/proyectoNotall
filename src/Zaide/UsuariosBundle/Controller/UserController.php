<?php

namespace Zaide\UsuariosBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Usuarios;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller {



    public function principalAdminAction() {
        // replace this example code with whatever you need
        return $this->render('@Usuarios/User/PrincipalAdmin.html.twig');
    }

    public function indexAction() {
        $em = $this-> getDoctrine()->getManager();
        $users = $em -> getRepository('AppBundle:Usuarios')-> findAll();

        return $this->render('UsuariosBundle:User:index.html.twig', array('user' => $users));

    }




}
