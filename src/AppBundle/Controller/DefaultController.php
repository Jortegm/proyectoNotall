<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuarios;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/servicios", name="Servicios")
     */
    public function serviciosAction(Request $request) {
        // replace this example code with whatever you need
        return $this->render('servicios/servicios.html.twig');
    }

    /**
     * @Route("/servicios", name="ParUsar")
     */
    public function parusarAction(Request $request){
        // replace this example code with whatever you need
        return $this->render('parusar/parusar.html.twig');
    }

}