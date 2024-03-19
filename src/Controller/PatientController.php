<?php

namespace App\Controller;

use App\Entity\User;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PatientController
{
    #[Route('')]
#Ex. http://127.0.0.1:8000/
    public function downloadAttachements()
    {
        return new Response();

    }


    public function askAppointment()
    {
        return new Response();

    }
}