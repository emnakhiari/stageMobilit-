<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;



class UserApiController extends AbstractController
{
 
    #[Route("user/details", name: "detailsCLient")]

    public function detailsCLient(UserRepository $userRepository, Request $request, NormalizerInterface $normalizer)
    {
        $id = $request->query->get("IdUtilisateur");
        $user = $userRepository->findAll();
        $userlogin = $normalizer->normalize($user, 'json', ['groups' => "user"]);
        //  $json = json_encode($userlogin);
        return new JsonResponse($userlogin, 200);
    }


}
