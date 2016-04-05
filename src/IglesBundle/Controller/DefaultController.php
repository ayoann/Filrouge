<?php

namespace IglesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    // public function indexAction()
    // {
    // 	return $this->render('IglesBundle::index.html.twig');
    // }

    public function profile_userAction()
    {
        return $this->render('IglesBundle::index.html.twig');
    }
}
