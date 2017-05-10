<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuarios;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\UsuariosType;
use AppBundle\Entity\Post;


class DefaultController extends Controller {
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
        // replace this example code with whatever you need
        return $this->render('plantilla.html.twig');
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
     * @Route("/cuaderno", name="Cuaderno")
     */
    public function cuadernoAction(Request $request) {
           return $this->render('pagin/cuaderno.html.twig');
    }

    /**
     * @Route("/para", name="Para")
     */
    public function parusarAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('para/para.htmil.twig');
    }

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
            $em->persist($user);
            $em->flush();
            $this->addFlash('estado', 'Bienvenido');
            return $this->redirectToRoute('Cuaderno', ['Usuario' => $user]);
        }

        return $this->render('registro/registro.html.twig', ['form' => $forma->createView()]);
    }

    /**
     * @Route("/log", name="login")
     */
    public function loginAction()
    {
        $helper = $this->get('security.authentication_utils');
        return $this->render('login/login.html.twig', [
            'error' => $helper->getLastAuthenticationError()
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