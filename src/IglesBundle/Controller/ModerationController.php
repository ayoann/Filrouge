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
     * Afficher les séries en attente
     *
     * @Route("/moderation", name="moderation")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $series = $em->getRepository('IglesBundle:Series')->getSeriesModeration();
        $countSeries = $em->getRepository('IglesBundle:Series')->countNotModererSeries();
        $saisons = $em->getRepository('IglesBundle:Saison')->getSaisonsModeration();
        $countSaisons = $em->getRepository('IglesBundle:Saison')->countNotModererSaisons();
        $episodes = $em->getRepository('IglesBundle:Episodes')->getEpisodeModeration();
        $countEpisodes = $em->getRepository('IglesBundle:Episodes')->countNotModererEpisode();

        return $this->render('IglesBundle::moderation.html.twig', array(
            'series' => $series, "countSeries" => $countSeries, 'saisons' => $saisons, 'countSaisons' => $countSaisons,
            'episodes' => $episodes, 'countEpisodes' => $countEpisodes
        ));
    }

    /**
     * @Route("/moderation/validate/serie/{id}", name="moderation_valide_serie")
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
     * @Route("/moderation/delete/serie/{id}", name="moderation_delete_serie")
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

    /**
     * @Route("/moderation/validate/saison/{id}", name="moderation_valide_saison")
     */
    public function valideSaisonAction($id=0){
        $em = $this->getDoctrine()->getManager();
        $saison = $this->getDoctrine()->getRepository("IglesBundle:Saison")->find($id);
        $saison->setModerationSaison(1);
 
        $em->persist($saison);
        $em->flush();
        return $this->redirect($this->generateUrl('moderation'));
    }

    /**
     * @Route("/moderation/delete/saison/{id}", name="moderation_delete_saison")
     */
    public function deleteSaisonAction($id=0)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $this->getDoctrine()->getRepository('IglesBundle:Saison');
        $saison = $repo->find($id);
        $em->remove($saison);
        $em->flush();
           
        return $this->redirect($this->generateUrl('moderation'));
    }

    /**
     * @Route("/moderation/validate/episode/{id}", name="moderation_valide_episode")
     */
    public function valideEpisodeAction($id=0){
        $em = $this->getDoctrine()->getManager();
        $episode = $this->getDoctrine()->getRepository("IglesBundle:Episodes")->find($id);
        $episode->setModerationEpisode(1);
 
        $em->persist($episode);
        $em->flush();
        return $this->redirect($this->generateUrl('moderation'));
    }

    /**
     * @Route("/moderation/delete/episode/{id}", name="moderation_delete_episode")
     */
    public function deleteEpisodeAction($id=0)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $this->getDoctrine()->getRepository('IglesBundle:Episode');
        $episode = $repo->find($id);
        $em->remove($episode);
        $em->flush();
           
        return $this->redirect($this->generateUrl('moderation'));
    }

    
}