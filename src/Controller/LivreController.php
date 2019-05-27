<?php

namespace App\Controller;
use App\Entity\Categorie;  
use App\Entity\Livre;  
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LivreController extends AbstractController
{
   
/**
 * @Route("/Livre/{id}",name="livre")
 * 
 */
public function showLivre($id){ 
        
    $x= $this->getDoctrine()->getRepository(Categorie::class); 

    $e= $this->getDoctrine()->getRepository(Livre::class); 
    $a= $e->find($id);

    $u= $this->getDoctrine()->getRepository(User::class); 
    $user =$u->find($a->getSlug());

    $r= $this->getDoctrine()->getRepository(Livre::class); 
    $Tlivre =$r->findBy(
    ['id_categori' => $a->getIdCategori() ]);

    $Repository= $this->getDoctrine()->getRepository(Livre::class); 
    $post = $Repository->find($id); 
    return $this->render('livre/index.html.twig',[
       'post' => $post,
       'livre'=>$Tlivre,
       'user'=>$user
    ]);
}

/**
 * @Route("/auteur/{id}",name="DescriptionAuteur")
 * 
 */
public function showauteur($id){ 

    $x= $this->getDoctrine()->getRepository(Categorie::class); 
    $e= $this->getDoctrine()->getRepository(User::class); 
    $user= $e->find($id);

    $r= $this->getDoctrine()->getRepository(Livre::class); 
    $Tlivre =$r->findBy(
    ['slug' => $user->GetId()]);

    return $this->render('auteur/description.html.twig',[ 
       'livre'=>$Tlivre,
       'user'=>$user
    ]);


}
 
}
