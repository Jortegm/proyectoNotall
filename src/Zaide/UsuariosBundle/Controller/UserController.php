<?php

namespace Zaide\UsuariosBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Usuarios;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\UsuariosType;


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

    /** Funcion que añada usuarios a la base de datos.
     * @return Response
     */
    public function addUserAction() {
        $user = new Usuarios();
        $form = $this->createCreateForm($user);

        return $this->render('UsuariosBundle:User:add.html.twig', array($form->createView()));
    }

    private function createCreateForm($user, $entity) {
        $form = $this->createForm(new UsuariosType(), $entity, array(
                                    'action'=> $this->generateUrl('usuarios_create'),
                                    'method'=>'POST')
                                  );
        return $form;
    }

}
