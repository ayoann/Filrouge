<?php
namespace IglesBundle\Controller;
use IglesBundle\Entity\Series;
use IglesBundle\Entity\Users;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;
/**
 * Follow controller.
 *
 */
class FollowController extends Controller
{
    /**
     * Suivre ou pas une serie.
     *
     * @Route("/sériesone/{id}/follow", name="follow")
     * @Method("GET")
     */
    public function followAction(Series $series){
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        if (!$user->getFollow()->contains($series)){

            $user->addFollow($series);
        }else{

            $user->removeFollow($series);
        }

        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('sériesone',['id'=>$series->getId()]);
    }
}