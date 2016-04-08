<?php

namespace IglesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class EpisodeController extends Controller
{
    /**
     * @Route("/episode{id}", name="episode")
     */
     public function selectAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $episodes=$this->getDoctrine()->getRepository('IglesBundle:Episodes')
        ->find($id);

        return $this->render('episode/episode.html.twig', 
            array('episodes' => $episodes));


    }
}
