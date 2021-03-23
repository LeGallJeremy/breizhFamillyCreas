<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SignInType;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
     public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder){
        $user = new User();
        
        

        if ($request->request->count() > 0) {

            $user->setUserName($request->request->get('_userName'))
                    ->setUserFirstName($request->request->get('_userFirstName'))
                    ->setUserMail($request->request->get('_userMail'))
                    ->setUserPassword($request->request->get('_userPassword'))
                    ->setConfirmPassword($request->request->get('_confirm_password'))
                    ->setUserCity($request->request->get('_userCity'))
                    ->setUserPostalCode($request->request->get('_userPostalCode'))
                    ->setUserAdress($request->request->get('_userAdress'));

            $hash = $encoder->encodePassword($user, $user->getUserPassword());
            $user->setUserPassword($hash);
            
            $manager->persist($user);
            $manager->flush();
            $message = "path('home')";
        }

        return $this->render('security/registration.html.twig');
    }

    /**
     * @Route("/connexion", name="security_login")
     */
    public function login(){
        return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout(){}

    
}