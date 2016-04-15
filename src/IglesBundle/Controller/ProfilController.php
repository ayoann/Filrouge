<?php

namespace IglesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\UserBundle\Controller\ProfileController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\User\UserInterface;

class ProfilController extends ProfileController
{
    /**
     * @Route("/profile/{id}", name="fos_user_profile_user")
     */
    //Fonction pour récupérer la liste de tous les utilisateurs
    public function userAction($id=0) {

        $em = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository("IglesBundle:Users")->find($id);
        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers(); 
        
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->render('FOSUserBundle:Profile:show_user_profile.html.twig', array(
            'user' => $user , 'users'=> $users
        ));
    }
}