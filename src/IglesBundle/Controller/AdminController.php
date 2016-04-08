<?php

namespace IglesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    //Fonction pour récupérer la liste de tous les utilisateurs
    public function usersAction() {

        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();

        return $this->render('IglesBundle::admin.html.twig', array('users' =>   $users));
    }
    /**
     * @Route("/admin/promote/{id}", name="igles_promote_user")
     */
    public function promoteUserAction($id=0){
        $em = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository("IglesBundle:Users")->find($id);
        $user->addRole("ROLE_ADMIN");
 
        $em->persist($user);
        $em->flush();
        return $this->render('IglesBundle::index.html.twig');
    }
}