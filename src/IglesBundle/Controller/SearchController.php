<?php

namespace IglesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Response;

class SearchController extends Controller
{

	/**
     * Search
     *
     * @Route("/search", name="search")
     * @Method("POST")
     */
    public function SearchAction(Request $request){
     
     	$searchRequest = $request->get('search');
     	
        $em = $this->getDoctrine()->getManager();
        $series = $em->getRepository('IglesBundle:Serie')->searchLike($searchRequest,20);
        $episodes = $em->getRepository('IglesBundle:Episode')->searchLike($searchRequest,20);

        return $this->render('Search/result_search.html.twig', array(
            'series'=>$series,'episodes'=>$episodes));
    }
}