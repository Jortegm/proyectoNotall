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
    public function serviciosAction(Request $request) {
        // replace this example code with whatever you need
        return $this->render('servicios/servicios.html.twig');
    }

    /**
     * @Route("/para", name="Para")
     */
    public function parusarAction(Request $request){
        // replace this example code with whatever you need
        return $this->render('para/para.htmil.twig');
    }

    /**
     * @Route("/registro", name="Registro")
     */
    public function registroAction(Request $request){
        // replace this example code with whatever you need
        $user = new Usuarios();
        $form = $this->createForm(UsuariosType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user-> setFechaAlta(new \DateTime("now"));
            $user ->setFechaActualizacion(new \DateTime("now"));
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $this->addFlash('estado', 'Ya formas parte de nosotros, comienza modificando tu perfil y a componer ');
            return $this->redirectToRoute( 'usuario_alta',['Usuario'=> $user->getId()] );
        }
        return $this->render('registro/registro.html.twig');
    }

    /**
     * @Route("/log", name="Login")
     */
    public function loginAction(Request $request){
        // replace this example code with whatever you need
        return $this->render('login/login.html.twig');
    }





}