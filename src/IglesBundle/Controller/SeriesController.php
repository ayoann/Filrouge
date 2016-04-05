<?php

namespace IglesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SeriesController extends Controller
{
    /**
     * @Route("/series", name="séries")
     */
    public function indexAction()
    {
    	return $this->render('IglesBundle::index.html.twig');
    }

    
}
