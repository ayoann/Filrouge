<?php

namespace IglesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    // public function indexAction()
    // {
    // 	return $this->render('IglesBundle::index.html.twig');
    // }


    //Fonction pour récupérer la liste de tous les utilisateurs
    public function usersAction() {

        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();

        return $this->render('IglesBundle::admin.html.twig', array('users' =>   $users));
    }
}