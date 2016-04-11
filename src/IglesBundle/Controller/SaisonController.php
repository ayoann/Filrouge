<?php

namespace IglesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SaisonController extends Controller
{
    /**
     * @Route("/saison", name="saison")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $saisons = $em->getRepository('IglesBundle:Saison')->findAll();

        return $this->render('Saisons/saisons.html.twig', array(
            'saisons' => $saisons,
        ));
    }
    
    /**
     * @Route("/saison/{id}", name="saisonone")
     */
     public function selectAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $saisons=$this->getDoctrine()->getRepository('IglesBundle:Saison')
        ->find($id);

        return $this->render('Saisons/saisons.html.twig', 
            array('saisons' => $saisons));
    }
}