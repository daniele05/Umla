<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PatientController
{

    #[Route('/patient/registration')]
    #Ex. http://127.0.0.1:8000/
    public function registration()
    {
        return new Response();

    }

    #[Route('/patient/profile')]
    #Ex. http://127.0.0.1:8000/
    public function profile()
    {
        return new Response();

    }

    #[Route('/patient/role')]
    #Ex. http://127.0.0.1:8000/
    public function role()
    {
        return new Response();

    }
}