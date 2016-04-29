<?php

namespace IglesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use IglesBundle\Entity\Saison;
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
     * @Route("/series/{id}/newSaison", name="saison_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
        $saison = new Saison();
        $em = $this->getDoctrine()->getManager();
        $serie = $em->getRepository('IglesBundle:Series')->find($id);
        $saison->setSerie($serie);
        $form = $this->createForm('IglesBundle\Form\SaisonType', $saison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($saison);
            $em->flush();

            return $this->redirectToRoute('sériesone',['id'=> $saison->getSerie()->getId()]);
        }

        return $this->render('Saisons/new.html.twig', array(
            'saisons' => $saison,
            'form' => $form->createView(),
        ));
    }

/**
     * Updates a Saison entity.
     *
     * @Route("series/updateSaison/{id}", name="saison_update")
     */
    public function updateAction(Request $request, Saison $saisons, $id)
    {   
        $saison = new Saison();
        $em = $this->getDoctrine()->getManager();
        $saison=$this->getDoctrine()->getRepository('IglesBundle:Saison')
        ->find($id);
    
        $deleteForm = $this->createDeleteForm($saison);
        $updateForm = $this->createForm('IglesBundle\Form\SaisonType', $saison);
        $updateForm->handleRequest($request);

        if ($updateForm->isSubmitted() && $updateForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($saison);
            $em->flush();


            return $this->redirectToRoute('sériesone',['id'=> $saison->getSerie()->getId()]);
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
     * @Route("saison/delete/{id}", name="saison_delete")
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $saison = $em->getRepository('IglesBundle:Saison')->find($id);
        
        

        $form = $this->createFormBuilder($saison)
                ->add('delete', 'submit')
                ->getForm();

        $form->handleRequest($request);

          $em->remove($saison);
          $em->flush();
           
        return $this->redirectToRoute('sériesone',['id'=> $saison->getSerie()->getId()]);

        $saisons = $em->getRepository('IglesBundle:Series')->getSaisons();

        return $this->render('series/serieone.html.twig', 
            array('series' => $series, "saisons" => $saisons));

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

