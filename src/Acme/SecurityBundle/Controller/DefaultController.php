<?php

namespace Acme\SecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $logger = $this->get('ACCESO -> REGISTRO LOGS');
        $logger->info('LOGUEADO');
        $logger->error('ERROR AL LOGUEAR');

        return $this->render('AcmeSecurityBundle:Default:index.html.twig');
    }
}

