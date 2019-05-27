<?php

namespace App\Controller;
use App\Entity\Livre;  
use App\Entity\Categorie; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
 
use App\Entity\User; 
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType; 
use Symfony\Component\Form\Extension\Core\Type\TextType; 
use Symfony\Component\Form\Extension\Core\Type\FileType;

class AfficheController extends AbstractController
{
    /**
     * @Route("/affiche/{id}", name="affiche")
     */
    public function index($id , Request $request)
    {
        $Repository=$this->getDoctrine()->getRepository(Categorie::class);
        $Categorie =$Repository->findAll() ;

        $r= $this->getDoctrine()->getRepository(Livre::class); 
        $Tlivre =$r->findBy(
        ['slug' => $id ]);
 
    $candidat = new Livre();
    $fb=$this->createFormBuilder($candidat)
        ->add('nom',TextType::class )
        ->add('description',TextType::class  )
        ->add('cout1',TextType::class )
        ->add('remise',TextType::class )
        ->add('id_categori',EntityType::class,[
            'class'=>Categorie::class,
            'choice_label'=>'nom',
        ])
        ->add('image', FileType::class, [
                'required' => false
            ])

        ->add('Valider',SubmitType::class);
        $candidat->setCreatedAt(new \DateTime() );
        $candidat->setSlug($id); 
         

        $form = $fb->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($candidat);
            $em->flush();
            return $this->redirectToRoute('affiche',['id'=>$id]);

        }
     
 

        return $this->render('affiche/index.html.twig', [
            'tlivre' => $Tlivre,
            'Categorie'=>$Categorie,
            'f'=>$form->createView()
        ]);
    }

    /**
     * @Route("/remove/{id}", name="remove")
     */
    public function remove($id)
    {
        $Categorie=$this->getDoctrine()->getRepository(Categorie::class);

        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Livre::class)->find($id);
        $entityManager->remove($product);
        $entityManager->flush();

        return $this->redirectToRoute('home');


    }
}
