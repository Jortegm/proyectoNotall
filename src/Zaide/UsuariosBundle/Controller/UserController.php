<?php

namespace Zaide\UsuariosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller {

    public function indexAction() {
        return new Response('Bienvenido a mi primera mierda en Syumfony');
    }




}
