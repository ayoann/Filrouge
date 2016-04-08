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
        $em = $this->getDoctrine()->getManager();

        $series = $em->getRepository('IglesBundle:Series')->findAll();

        return $this->render('series/series.html.twig', array(
            'series' => $series,
        ));
    }
}
