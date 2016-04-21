<?php

namespace IglesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use IglesBundle\Entity\Series;

use Symfony\Component\HttpFoundation\Response;

class SeriesController extends Controller
{
    /**
     * Lists all Series entities.
     *
     * @Route("/series", name="séries")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $series = $em->getRepository('IglesBundle:Series')->getSeries();

        return $this->render('series/series.html.twig', array(
            'series' => $series,
        ));
    }

    /**
     * @Route("/series/{id}", name="sériesone")
     */
     public function selectAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $series=$this->getDoctrine()->getRepository('IglesBundle:Series')
        ->find($id);

        $saisons = $em->getRepository('IglesBundle:Series')->getSaisons();

        return $this->render('series/serieone.html.twig', 
            array('series' => $series, "saisons" => $saisons));

    }

    /**
     * Creates a new Serie entity.
     *
     * @Route("/new", name="serie_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $serie = new Serie();
        $form = $this->createForm('IglesBundle\Form\SerieType', $serie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($serie);
            $em->flush();

            return $this->redirectToRoute('serie_show', array('id' => $serie->getId()));
        }

        return $this->render('serie/new.html.twig', array(
            'serie' => $serie,
            'form' => $form->createView(),
        ));
    }

    
    /**
     * Deletes a Serie entity.
     *
     * @Route("/delete/{id}", name="serie_delete")
     */
    public function deleteAction(Request $request, $id)
    {
         $em = $this->getDoctrine()->getManager();
        $series = $em->getRepository('IglesBundle:Series')->find($id);
        
        

        $form = $this->createFormBuilder($series)
                ->add('delete', 'submit')
                ->getForm();

        $form->handleRequest($request);

          $em->remove($series);
          $em->flush();
           
        return $this->redirectToRoute('séries');

        $saisons = $em->getRepository('IglesBundle:Series')->getSaisons();

        return $this->render('series/serieone.html.twig', 
            array('series' => $series, "saisons" => $saisons));

    }

    /**
     * Creates a form to delete a Serie entity.
     *
     * @param Serie $serie The Serie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Series $serie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('serie_delete', array('id' => $serie->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


}
