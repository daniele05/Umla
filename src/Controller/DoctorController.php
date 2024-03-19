<?php

namespace App\Controller;

use App\Entity\User;

class DoctorController
{
    #[Route('/doctor/Forum')]
    #Ex. http://127.0.0.1:8000/
    public function Forum()
    {
        return new Response();

    }

    #[Route('/doctor/post')]
    #Ex. http://127.0.0.1:8000/
    public function Post()
    {
        return new Response();

    }
}