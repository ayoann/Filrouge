<?php
namespace IglesBundle\Controller;
use IglesBundle\Entity\Series;
use IglesBundle\Entity\Users;
use IglesBundle\Entity\Episodes;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
/**
 * Watch controller.
 *
 */
class WatchController extends Controller
{
    /**
     * Vue ou pas vue épisodes.
     *
     * @Route("/episode/{id}/watch", name="episode_vue")
     * @Method("GET")
     */
    public function watchAction(Episodes $episodes){

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        if (!$user->getWatch()->contains($episodes)){

            $user->addWatch($episodes);
        }else{

            //Sinon on le supprime
            $user->removeWatch($episodes);
        }

        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('episode',['id'=>$episodes->getId()]);
    }
}