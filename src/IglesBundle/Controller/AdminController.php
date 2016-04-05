<?php

namespace IglesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function indexAction()
    {
    	return $this->render('IglesBundle::admin.html.twig');
    }

    // public function profile_userAction()
    // {
    //     return $this->render('IglesBundle::index.html.twig');
    // }
}