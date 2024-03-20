<?php

namespace App\Controller;

use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\DoctorUser;
use App\Entity\User;


class DoctorUserController extends AbstractController
{
    #[Route('/doctoruser/post')]
    #Ex. http://127.0.0.1:8000/
    public function Post()
    {
        return new Response();

    }
}