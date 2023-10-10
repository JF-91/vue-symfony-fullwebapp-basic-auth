<?php

namespace App\Controller;

use App\Entity\User;

use Doctrine\ORM\EntityManagerInterface;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/api', name: 'api_')]
class RegistrationController extends AbstractController
{

    private $manager;
    private $userPasswordHasher;

    private $serializator;

    public function __construct(
        EntityManagerInterface $manager, 
        UserPasswordHasherInterface $userPasswordHasher, 
    
        SerializerInterface $serializator ){

        $this->manager = $manager;
        $this->userPasswordHasher = $userPasswordHasher;

        $this->serializator = $serializator;
    }


    #[Route('/register', name: 'app_register' , methods: ['POST'])]
    public function index(Request $request): JsonResponse
    {
     
        try {
            $data = $request->getContent();
            $user = $this->serializator->deserialize($data, User::class, 'json');
            $user->setPassword($this->userPasswordHasher->hashPassword($user, $user->getPassword()));
            $this->manager->persist($user);
            $this->manager->flush();
            return new JsonResponse("Registered Successfully", Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return new JsonResponse($th->getMessage(), Response::HTTP_BAD_REQUEST);
        }
       
    }
}
