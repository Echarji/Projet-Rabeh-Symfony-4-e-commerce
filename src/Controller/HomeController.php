<?php

namespace App\Controller; 
use   App\Entity\Categorie;
use  App\Entity\Footer;
use Symfony\Component\HttpFoundation\Response; 
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Livre;


use App\Entity\Contact; 
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType; 
use Symfony\Component\Form\Extension\Core\Type\TextType; 
use Symfony\Component\HttpFoundation\Request;


use Illuminate\Support\Facades\Auth;
use App\Entity\User;
 
class HomeController  extends AbstractController
{
/**
 * 
 * @RoUTE("/",name="home")
 */
public function index() 
    {  
        $Repository= $this->getDoctrine()->getRepository(Categorie::class);
        $x =$Repository->findAll() ;
 
        $em = $this->getDoctrine()->getManager();
        $li = $em->getRepository(Livre::class);
        $Livre = $li->getNb();
        $TLivre = $li->findAll();


        $em = $this->getDoctrine()->getManager();
        $locationRepo = $em->getRepository(Categorie::class);
        $Cat = $locationRepo->getNb();
        

        $Rep= $this->getDoctrine()->getRepository(Footer::class);
        $footer =$Rep->find(1) ;

        $top = $li->findBy(array(),array('created_at' => 'desc'),5);

        return $this->render('home.html.twig',[
            'categories' => $x,
            'footer'=> $footer,
            'countLivre'=>$Livre ,
            'cat'=>$Cat,
            'TLivres'=>$TLivre,
            'top'=>$top
        ]); 
    }



       
/**
 * @Route("/Contact", name="Contact")
 */
public function ajouter(Request $request)
{
    $candidat = new Contact();
    $fb=$this->createFormBuilder($candidat)
        ->add('nom',TextType::class )
        ->add('email',TextType::class  )
        ->add('numtel',TextType::class )
        ->add('message',TextType::class )
         

        ->add('Valider',SubmitType::class);
        $candidat->setCreatedAt(new \DateTime() );

        $form = $fb->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($candidat);
            $em->flush();
            return $this->redirectToRoute('home');

        }
    $form = $fb->getForm();
    return $this->render('contact.html.twig',
    ['f'=>$form->createView()]);
}

    
      

    

/**
 * @Route("/categories/{id}",name="categories")
 * 
 */
public function show($id){
    $Repository=$this->getDoctrine()->getRepository(Categorie::class);
    $post = $Repository->find($id); 

    $Repository= $this->getDoctrine()->getRepository(Livre::class);
    $Livre =$Repository->findAll() ;

    return $this->render('categorie.html.twig',[
            'post' => $post ,
            'Livre' => $Livre

        ]);
}



/**
 * @Route("/recherche",name="recherche")
 * 
 */
public function recherche(Request $request){
    $params = $request->query->all();
    $R =$this->getDoctrine()->getRepository(Categorie::class);
    $Categorie =$R->findAll() ;
    $Repository=$this->getDoctrine()->getRepository(Livre::class); 
    $id=$request->get('id');
    $nom=$request->get('nom');
    $post = $Repository->findBy(array('nom' => $nom, 'id_categori'=>$id));
    return $this->render('recherche.html.twig',[
            'Livre' => $post,
            'Categorie'=>$Categorie   
        ]);
 
} 


/**
 * @Route("/Modifier/{id}",name="Modifier")
 * 
 */
public function Modifier($id){
    $Repository=$this->getDoctrine()->getRepository(Categorie::class);
    $post = $Repository->findAll(); 

    $Repository= $this->getDoctrine()->getRepository(Livre::class);
    $Livre =$Repository->find ($id) ;

    return $this->render('modifier.html.twig',[
             'categories' =>$post,
            'Livre' => $Livre

        ]);

}


/**
 * @Route("/Mod/{id,nom,description,cout,remise,categorie}",name="Mod")
 * 
 */
public function Mod(Request $request){
    $params = $request->query->all();
    $R =$this->getDoctrine()->getRepository(Categorie::class);
    $Categorie =$R->findAll() ;

    $entityManager = $this->getDoctrine()->getManager();
    $Repository=$this->getDoctrine()->getRepository(Livre::class)->find ($request->get('id')) ; 
    if($request->get('nom') != null)
    $Repository->setNom($request->get('nom'));
    if($request->get('description') != null)
    $Repository->setDescription($request->get('description'));
    if ( $request->get('cout') != null) {
    $Repository->setCout1($request->get('cout'));
    }
    if($request->get('remise') != null ) {
    $Repository->setRemise($request->get('remise'));
    }
    //$Repository->setIdCategori( $request->get('categorie')); 
        $entityManager->persist($Repository); 
        $entityManager->flush();

    
    
     
   
    return new  Response ('modification');

}

}

?>