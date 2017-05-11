<?php

namespace Zaide\UsuariosBundle\Controller;

use AppBundle\Entity\Usuarios;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\UsuariosType;
use AppBundle\Entity\Post;
use Symfony\Component\HttpFoundation\Request;


class UserController extends Controller {

    /**
     * @Security("is_granted('ROLE_ADMIN')"):
     * @return Response
     */
    public function principalAdminAction() {
        // replace this example code with whatever you need
        return $this->render('@Usuarios/User/PrincipalAdmin.html.twig');
    }


    public function indexAction(Request $request) {
            /** @var EntityManager $em */
            $em = $this-> getDoctrine()->getManager();
            $users = $em->createQueryBuilder()
                ->select ('u')
                ->from ('AppBundle:Usuarios', 'u')
                ->getQuery ()
                ->getResult();

            $paginacion = $this->get('knp_paginator');
            $pagination = $paginacion->paginate($users, $request->query->getInt('page', 1), 10);
            //$users = $em -> getRepository('AppBundle:Usuarios')-> findAll();

            return $this->render('UsuariosBundle:User:index.html.twig', array('pagination' => $pagination));

    }

    /** Funcion que añada usuarios a la base de datos.
     * @return Response
     *
     */
    public function addUserAction(Request $request) {
            $user = new Usuarios();
            $forma = $this->createForm(UsuariosType::class, $user);
            $forma->handleRequest($request);

            if ($forma->isSubmitted() && $forma->isValid()) {
                $user-> setFechaAlta(new \DateTime("now"));
                $user ->setFechaActualizacion(new \DateTime("now"));
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                $this->addFlash('estado', 'Usuario Añadido Correctamente');
                return $this->redirectToRoute( 'usuarios_registro',['Usuario'=> $user->getId()] );
            }


        return $this->render('UsuariosBundle:User:add.html.twig', ['form' => $forma->createView()]);
    }

    public function editAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $idUsuario = $request->get('id');
        $usuario = $em->getRepository('AppBundle:Usuarios')->find($idUsuario);
        $form = $this->createForm(UsuariosType::class, $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $claveFormulario = $form->get('passwdUsuario')->getData();

            if ($claveFormulario) {
                $clave = $this->get('security.password_encoder')
                    ->encodePassword($usuario, $claveFormulario);

                $usuario->setPasswdUsuario($clave);
            }
            $em->flush();
            $this->addFlash('estado', 'Cambios guardados con éxito');
            return $this->redirectToRoute('usuarios_registro', ['usuarios'=>$usuario->getId()]);
        }

        return $this->render('UsuariosBundle:User:edit.html.twig', ['usuarios' => $usuario, 'form' => $form->createView()
        ]);
    }


    public function deleteAction(Usuario $usuario) {
        $em = $this->getDoctrine()->getManager();
        try {
            $em->remove($usuario);
            $em->flush();
            $this->addFlash('estado', 'Usuario eliminado con éxito');
        }
        catch(Exception $e) {
            $this->addFlash('error', 'No se han podido eliminar');
        }
        return $this->redirectToRoute('usuarios_registro');

    }

}
