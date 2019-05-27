<?php

namespace App\Controller;
use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AuteurController extends AbstractController
{
    /**
     * @Route("/auteur", name="auteur")
     */
    public function index()
    {

        $u= $this->getDoctrine()->getRepository(User::class); 
        $user =$u->findAll() ;

        return $this->render('auteur/index.html.twig', [
            'user' => $user
        ]);
    }
}
