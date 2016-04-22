<?php

namespace IglesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use IglesBundle\Entity\Series;
use Symfony\Component\HttpFoundation\Response;

class EpisodeController extends Controller
{
    /**
     * @Route("/episode/{id}", name="episode")
     */
     public function selectAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $episodes=$this->getDoctrine()->getRepository('IglesBundle:Episodes')
        ->find($id);

        return $this->render('episode/episode.html.twig', 
            array('episodes' => $episodes));


    }

    /**
     * Creates a new Episodes entity.
     *
     * @Route("/newEpisode", name="episodes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $episodes = new Episodes();
        $form = $this->createForm('IglesBundle\Form\EpisodesType', $episodes);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($episodes);
            $em->flush();

            return $this->redirectToRoute('séries');
        }

        return $this->render('episodes/new.html.twig', array(
            'episodes' => $episodes,
            'form' => $form->createView(),
        ));
    }

/**
     * Updates a Episodes entity.
     *
     * @Route("/updateEpisode/{id}", name="episodes_update")
     */
    public function updateAction(Request $request, Episodes $episodes)
    {
        $deleteForm = $this->createDeleteForm($episodes);
        $updateForm = $this->createForm('IglesBundle\Form\EpisodesType', $episodes);
        $updateForm->handleRequest($request);

        if ($updateForm->isSubmitted() && $updateForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($episodes);
            $em->flush();

            return $this->redirectToRoute('séries');
        }

        return $this->render('episodes/update.html.twig', array(
            'episodes' => $episodes,
            'update_form' => $updateForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    
    /**
     * Deletes a Episodes entity.
     *
     * @Route("/deleteEpisode/{id}", name="episodes_delete")
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $episodes = $em->getRepository('IglesBundle:Episodes')->find($id);
        
        

        $form = $this->createFormBuilder($episodes)
                ->add('delete', 'submit')
                ->getForm();

        $form->handleRequest($request);

          $em->remove($episodes);
          $em->flush();
           
        return $this->redirectToRoute('séries');

        $saisons = $em->getRepository('IglesBundle:Episodes')->getSaisons();

        return $this->render('episodes/episodesone.html.twig', 
            array('episodes' => $episodes, "saisons" => $saisons));

    }

    /**
     * Creates a form to delete a Episodes entity.
     *
     * @param episodes $episodes The Episodes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Episodes $episodes)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('episodes_delete', array('id' => $episodes->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


}


