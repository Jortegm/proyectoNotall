<?php

namespace Zaide\UsuariosBundle\Controller;

use AppBundle\Entity\Usuarios;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\UsuariosType;
use AppBundle\Entity\Post;
use Symfony\Component\HttpFoundation\Request;

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
     *
     */
    public function addUserAction(Request $request) {
            $user = new Usuarios();
            $form = $this->createForm(UsuariosType::class, $user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $user-> setFechaAlta(new \DateTime("now"));
                $user ->setFechaActualizacion(new \DateTime("now"));
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                $this->addFlash('estado', 'Usuario Añadido Correctamente');
                return $this->redirectToRoute( 'usuarios_registro',['Usuario'=> $user->getId()] );
            }


        return $this->render('UsuariosBundle:User:add.html.twig', ['form' => $form->createView()]);
    }

//    public function editAction (Usuarios $usuarios) {
//        em = $this->getDoctrine()->getManager();
//        $em->edit($usuarios);
//        $em->flush();
//        $this->addFlash('estado', 'Usuario modificado con éxito');
//
//
//        return $this->redirectToRoute('usuarios_registro');
//
//    }
//
//
//    }




    public function deleteAction(Usuarios $usuarios) {

        $em = $this->getDoctrine()->getManager();
            $em->remove($usuarios);
            $em->flush();
            $this->addFlash('estado', 'Usuario eliminado con éxito');


            return $this->redirectToRoute('usuarios_registro');

    }

}
