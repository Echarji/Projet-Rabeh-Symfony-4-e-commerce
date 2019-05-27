<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/security", name="security")
     */
    public function security(Request $request,objectManager $manager,UserPasswordEncoderInterface  $encodeur )
    {
        $user=new User();
        
        $date = new \DateTime();
        $result = $date->format('Y-m-d H:i:s');

        $user->setSlug( $result );
        $form=$this->createForm(RegistrationType::class,$user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() ){
            $hash=$encodeur->encodePassword($user, $user->getMotdepasse());

            $user->setMotdepasse($hash);
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('security_login');
        }

        
        return $this->render('security/registration.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/connexion",name="security_login")
     * 
     */
    public function login(AuthenticationUtils $authenticationUtils){
        $error = $authenticationUtils->getLastAuthenticationError();
        
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render("security/login.html.twig", [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    /**
     * @Route("/deconnection",name="deconnection")
     * 
     */
    public function deconnection(){}
}
