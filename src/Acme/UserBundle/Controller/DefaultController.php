<?php

namespace Acme\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
  * @Route("/users")
 */
class DefaultController extends Controller
{

    /**
     * @Route("/", name="home_users")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');

    }

    /**
     * @Route("/show/{id}", name="show_user")
     */
    public function showUserAction($id)
    {
        return $this->render('AcmeUserBundle:Default:showUser.html.twig');

    }

    /**
     * @Route("/list", name="list_users")
     */
    public function listUsersAction()
    {
        return $this->render('AcmeUserBundle:Default:listUsers.html.twig');

    }

    /**
     * @Route("/create", name="create_user")
     */
    public function createUserAction()
    {
        return $this->render('AcmeUserBundle:Default:createUser.html.twig');

    }
}



//users_show:
//path: /users/{user_id}
//    defaults: {controller: AcmeUserBundle:Default:user }
//    methods: [GET]
//    requirements:
//      _format: html
//      _locale: es|en
//
//users_list:
//    path: /users
//    defaults: {controller: AcmeUserBundle:Default:userlist }
//    methods: [GET]
//    requirements:
//        _format: html
//        _locale: es|en
//
//users_create:
//    path: /users/create
//    defaults: {controller: AcmeUserBundle:Default:usercreate }
//    methods: [POST]
//    requirements:
//       _format: html
//       _locale: es|en
//
