<?php

namespace IglesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class EpisodeController extends Controller
{
    /**
     * @Route("/episode", name="episode")
     */
     public function selectAction($id)
    {
        $episodes=$this->getDoctrine()->getRepository('IglesBundle:Episode')
        ->find($id);

        return $this->render('IglesBundle:Episode:episode.html.twig', 
            array('episode' => $episodes));
    }
}
