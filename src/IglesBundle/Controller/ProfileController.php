<?php

namespace IglesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProfileController extends Controller
{
    /**
     * @Route("/profile/", name="fos_user_profile_show")
     */

    public function usersAction() {

        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();

        return $this->render('series/series.html.twig', array('users' =>   $users));
    }
   
}