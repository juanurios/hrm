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
        $logger = $this->get('logger');
        $logger->info('LOGUEADO');

        return $this->render('AcmeSecurityBundle:Default:index.html.twig');
    }
}

