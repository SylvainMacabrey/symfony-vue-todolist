<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{

    public function __construct(UserRepository $userRepository, EntityManagerInterface $em)
    {
        $this->userRepository = $userRepository;
        $this->em = $em;
    }

    /**
     * @Route("/", name="user.index")
     */
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/users", name="user.all")
     */
    public function getAllUsers(): Response
    {
        return $this->json([
            'users' => $this->userRepository->transformAll(),
        ]);
    }

    /**
     * @Route("/users/{id}", name="user.delete", methods="DELETE")
     */
    public function deleteUser(User $user)
    {
        $this->em->remove($user);
		$this->em->flush();
        return $this->json('user delete');
    }

}
