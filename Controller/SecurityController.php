<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $manager = $this->getDoctrine()->getManager();
        # create form createForm(class name that has the form, link the form field with the user field)
        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            $hashconfirm = $encoder->encodePassword($user, $user->getConfirmpassword());
            $user->setConfirmpassword($hashconfirm);

            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('security_login');
        }

        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/connexion" , name="security_login")
     */
    public function login()
    {
        return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout()
    {
    }

    /**
     * @Route("security/remove/{$id}", name="supprimer_user")
     */
    //public function delete($id): Response
    //{

    //    $repo = $this->getDoctrine()->getRepository(User::class);
    //    $user = $repo->find($id);
    //    $manager = $this->getDoctrine()->getManager();
    //    $manager->remove($user);
    //    $manager->flush();


    //    return new Response('Suppression Valider');
    //}

    /*
    /**
     * @Route("/security/users", name="Listusers")
     */
    //public function user($id): Response
    //{
    //    $repo = $this->getDoctrine()->getRepository(User::class);
    //    $users = $repo->findAll($id);
    //    return $this->render('security/user_list.html.twig', ['users' => $users]);
    //}

    /**
     * @Route("/security/detail{id}", name="detail_user")
     */
    //public function detail($id): Response
    //{
    //    $repo = $this->getDoctrine()->getRepository(User::class);
    //    $user = $repo->find($id);
    //    return $this->render('product/detail.html.twig', ['user' => $user]);
    //}

}
