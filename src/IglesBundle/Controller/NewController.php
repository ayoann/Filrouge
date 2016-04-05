<?php

namespace IglesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class NewController extends Controller
{
    /**
     * @Route("/news", name="news")
     */
    public function indexAction()
    {
    	return $this->render('IglesBundle::news.html.twig');
    }

   
}
