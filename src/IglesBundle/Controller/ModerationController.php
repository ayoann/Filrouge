<?php

namespace IglesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use IglesBundle\Entity\Series;
use Symfony\Component\HttpFoundation\Response;

class ModerationController extends Controller
{
    /**
     * Lists all Series entities.
     *
     * @Route("/moderation", name="moderation")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $series = $em->getRepository('IglesBundle:Series')->getValidate();

        return $this->render('IglesBundle::moderation.html.twig', array(
            'series' => $series,
        ));
    }

    /**
     * @Route("/moderation/validate/{id}", name="moderation_valide_serie")
     */
    public function valideSerieAction($id=0){
        $em = $this->getDoctrine()->getManager();
        $serie = $this->getDoctrine()->getRepository("IglesBundle:Series")->find($id);
        $serie->setModeration(1);
 
        $em->persist($serie);
        $em->flush();
        return $this->redirect($this->generateUrl('moderation'));
    }

    /**
     * @Route("/moderation/delete/{id}", name="moderation_delete_serie")
     */
    public function deleteSerieAction($id=0)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $this->getDoctrine()->getRepository('IglesBundle:Series');
        $serie = $repo->find($id);
        $em->remove($serie);
        $em->flush();
           
        return $this->redirect($this->generateUrl('moderation'));
    }

    
}