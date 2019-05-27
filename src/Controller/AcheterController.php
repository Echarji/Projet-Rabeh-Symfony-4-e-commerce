<?php

namespace App\Controller;
use App\Entity\Livre;   
use App\Entity\Categorie;
use App\Entity\User; 
use App\Entity\Acheter; 


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


use Symfony\Component\Form\Extension\Core\Type\DateType; 
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\Response; 

class AcheterController extends AbstractController
{
    /**
     * @Route("/acheter/{id}", name="afficheacheter")
     */
    public function index($id)
    {

        $Repository=$this->getDoctrine()->getRepository(Acheter::class);
        $Acheterr =$Repository->findBy(['id_user' => $id ]) ;

        $Repository=$this->getDoctrine()->getRepository(Categorie::class);
    $post = $Repository->findAll(); 

    $Repository= $this->getDoctrine()->getRepository(Livre::class);
    $Livre =$Repository->findAll () ;
        
        
         
        

        return $this->render('acheter/index.html.twig', [
            'Acheter' => $Acheterr,
            'Livre'=>$Livre  
        ]);
    }


    /**
     * @Route("/acheter/{idu}/{idLi}", name="acheter")
     */
    public function acheter($idu, $idLi)
    {

        
        $ajoute = $this->getDoctrine()->getManager();
        $ach = new Acheter();
        $ach->setIdLivre($idLi);
        $ach->setIdUser($idu); 
        $ajoute->persist($ach); 
        $ajoute->flush(); 

        return $this->redirectToRoute('home');
    }


    /**
     * @Route("/supprimer/{id}", name="supprimer")
     */
    public function remove($id)
    { 
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Acheter::class)->find($id);
        $entityManager->remove($product);
        $entityManager->flush();

         return $this->redirectToRoute('home');
    }


   
}