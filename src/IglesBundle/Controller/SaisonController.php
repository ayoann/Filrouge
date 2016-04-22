<?php

namespace IglesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use IglesBundle\Entity\Series;
use Symfony\Component\HttpFoundation\Response;

class SaisonController extends Controller
{
    /**
     * @Route("/saison", name="saison")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $saisons = $em->getRepository('IglesBundle:Saison')->getSaisons();

        return $this->render('Saisons/saisons.html.twig', array(
            'saisons' => $saisons
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

        $episodes = $em->getRepository('IglesBundle:Saison')->getEpisodes();

        return $this->render('Saisons/saisons.html.twig', 
            array('saisons' => $saisons, 'episode' => $episodes));
    }

    /**
     * Creates a new Saison entity.
     *
     * @Route("/newSaison", name="saison_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $saison = new Saison();
        $form = $this->createForm('IglesBundle\Form\SaisonType', $saison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($saison);
            $em->flush();

            return $this->redirectToRoute('séries');
        }

        return $this->render('Saisons/new.html.twig', array(
            'saisons' => $saison,
            'form' => $form->createView(),
        ));
    }

/**
     * Updates a Saison entity.
     *
     * @Route("/updateSaison/{id}", name="saison_update")
     */
    public function updateAction(Request $request, Saison $saisons)
    {
        $deleteForm = $this->createDeleteForm($saison);
        $updateForm = $this->createForm('IglesBundle\Form\saisonsType', $saison);
        $updateForm->handleRequest($request);

        if ($updateForm->isSubmitted() && $updateForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($saison);
            $em->flush();

            return $this->redirectToRoute('séries');
        }

        return $this->render('Saisons/update.html.twig', array(
            'saison' => $saison,
            'update_form' => $updateForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    
    /**
     * Deletes a Saison entity.
     *
     * @Route("/deleteSaison/{id}", name="saison_delete")
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $saison = $em->getRepository('IglesBundle:Saison')->find($id);
        
        

        $form = $this->createFormBuilder($saisons)
                ->add('delete', 'submit')
                ->getForm();

        $form->handleRequest($request);

          $em->remove($saisons);
          $em->flush();
           
        return $this->redirectToRoute('séries');

        $saisons = $em->getRepository('IglesBundle:Saison')->getSaison();

        return $this->render('Saisons/saisonone.html.twig', 
            array('saison' => $saison, "saisons" => $saisons));

    }

    /**
     * Creates a form to delete a Saison entity.
     *
     * @param saison $saison The Saison entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Saison $saison)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('saison_delete', array('id' => $saison->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


}

