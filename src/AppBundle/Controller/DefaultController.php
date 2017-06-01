<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Partitura;
use AppBundle\Entity\Usuarios;
use AppBundle\Form\PartituraType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\UsuariosType;
use AppBundle\Entity\Post;


class DefaultController extends Controller
{

    //------------------------------------------------------------------------------------------------------------------
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('notall.html.twig');
    }

    /**
     * @Route("/principal", name="principal")
     */
    public function principalAction(Request $request){
        /** @var EntityManager $em */
        $em = $this-> getDoctrine()->getManager();
        $partitura = $em->createQueryBuilder()
            ->select ('u')
            ->from ('AppBundle:Partitura', 'u')
            ->getQuery ()
            ->getResult();

        $paginacion = $this->get('knp_paginator');
        $pagination = $paginacion->paginate($partitura, $request->query->getInt('page', 1), 5);
        //$users = $em -> getRepository('AppBundle:Usuarios')-> findAll();
        // replace this example code with whatever you need
        return $this->render('plantilla.html.twig', array('pagination' => $pagination));
    }

    /**
     * @Route("/servicios", name="Servicios")
     */
    public function serviciosAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('servicios/servicios.html.twig');
    }

    /**
     * @Route("/nociones", name="nociones")
     */
    public function nocionesAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('nociones/nociones.html.twig');
    }

    /**
     * @Route("/para", name="Para")
     */
    public function parusarAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('para/para.htmil.twig');
    }

    //------------------------------------------------------------------------------------------------------------------
    //funciones para el perfil usuario: MOSTRAR DATOS,MOSTRAR PARTITURA, MOSTRAR LISTADO PARTITURAS

    /**
     * @Route("/cuaderno", name="Cuaderno")
     */
    public function cuadernoAction(Request $request) {
        return $this->render('pagin/cuaderno.html.twig');
    }

    /**
     * @Route("/perfil", name="Perfil")
     */
    public function perfilAction(Request $request , Usuarios $usuario = null) {
        if (null === $usuario) {
            $usuario = $this->getUser();
        }
        $form = $this->createForm(UsuariosType::class, $usuario);

        /** @var EntityManager $em */
        $em = $this-> getDoctrine()->getManager();
        $idUsuario = $usuario->getId();
        $users = $em->createQueryBuilder()
            ->select ('u')
            ->from ('AppBundle:Usuarios', 'u')
            ->where('u.id = :user')
            ->setParameter('user', $idUsuario)
            ->getQuery ()
            ->getResult();

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
            return $this->redirectToRoute('Perfil', ['usuarios'=>$usuario->getId()]);
        }

        return $this->render('pagin/perfil.html.twig', array('users' => $users, 'form' => $form->createView()));
    }

    /**
     * @Route("/partitura", name="Partitura")
     */
    public function partituraAction(Request $request) {
        return $this->render('pagin/partitura.html.twig');
    }

    /**
     * @Route("/lstpar", name="lstpar")
     */
    public function lstpaAction(Request $request )
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $partitura = $em->createQueryBuilder()
            ->select('u')
            ->from('AppBundle:Partitura', 'u')
            ->where('u.PartituraUsuario=:user')
            ->setParameter('user', $this->getUser())
            ->getQuery()
            ->getResult();

            $paginacion = $this->get('knp_paginator');
            $pagination = $paginacion->paginate($partitura, $request->query->getInt('page', 1), 3);

            return $this->render('pagin/lstpa.html.twig', array('pagination' => $pagination));

    }

    //------------------------------------------------------------------------------------------------------------------




    //------------------------------------------------------------------------------------------------------------------
    //Funciones para el LOGIN

    /**
     * @Route("/registro", name="Registro")
     */
    public function registroAction(Request $request)
    {
        $user = new Usuarios();
        $forma = $this->createForm(UsuariosType::class, $user);
        $forma->handleRequest($request);

        if ($forma->isSubmitted() && $forma->isValid()) {
            $user->setFechaAlta(new \DateTime("now"));
            $user->setFechaActualizacion(new \DateTime("now"));
            $user->setTipoDeUsuario('ROLE_USER');
            $em = $this->getDoctrine()->getManager();

            $claveFormulario = $forma->get('passwdUsuario')->getData();

            if ($claveFormulario) {
                $clave = $this->get('security.password_encoder')
                    ->encodePassword($user, $claveFormulario);

                $user->setPasswdUsuario($clave);
            }

            $em->persist($user);
            $em->flush();
            $this->addFlash('estado', 'Bienvenido');
            return $this->redirectToRoute('login', ['Usuario' => $user]);
        }

        return $this->render('registro/registro.html.twig', ['form' => $forma->createView()]);
    }

    /**
     * @Route("/log", name="login")
     */
    public function loginAction()
    {
        $helper = $this->get('security.authentication_utils');

        // replace this example code with whatever you need
        return $this->render('login/login.html.twig', ['error' => $helper->getLastAuthenticationError()
        ]);

    }

    /**
     * @Route("/comprobar", name="comprobar")
     * @Route("/salir", name="salir")
     */
    public function comprobarAction()
    {

    }
}

