<?php

namespace Zaide\UsuariosBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Usuarios;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller {

    public function indexAction() {
        $em = $this-> getDoctrine()->getManager();
        $users = $em -> getRepository('AppBundle:Usuarios')-> findAll();

        return $this->render('UsuariosBundle:User:index.html.twig', array('user' => $users));

    }




}
