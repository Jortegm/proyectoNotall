<?php

namespace Zaide\UsuariosBundle\Controller;

use AppBundle\Entity\Usuarios;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Entity;
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

    public function indexAction(Request $request) {
        /** @var EntityManager $em */
        $em = $this-> getDoctrine()->getManager();
        $users = $em->createQueryBuilder()
            ->select ('u')
            ->from ('AppBundle:Usuarios', 'u')
            ->getQuery ()
            ->getResult();

        $paginacion = $this->get('knp_paginator');
        $pagination = $paginacion->paginate($users, $request->query->getInt('page', 1), 3);
        $users = $em -> getRepository('AppBundle:Usuarios')-> findAll();

        return $this->render('UsuariosBundle:User:index.html.twig', array('pagination' => $pagination));

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

    public function editAction(Request $request) {
        /** @var EntityManager $em */
        $usuario = new Usuarios();
        $em = $this->getDoctrine()->getManager();

        if (null == $usuario) {
            $categoria = new Categoria();
            $em->persist($categoria);
        }

        $form = $this->createForm(CategoriaType::class, $categoria);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('estado', 'Cambios guardados con éxito');
            return $this->redirectToRoute('listadoCategorias',['categoria'=>$categoria->getId()]);
        }

        return $this->render('categorias/form.html.twig', [
            'categoria' => $categoria,
            'form' => $form->createView()
        ]);
    }


    public function deleteAction(Usuarios $usuarios) {

        $em = $this->getDoctrine()->getManager();
            $em->remove($usuarios);
            $em->flush();
            $this->addFlash('estado', 'Usuario eliminado con éxito');


            return $this->redirectToRoute('usuarios_registro');

    }

}
