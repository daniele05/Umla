<?php

namespace App\Controller;

use http\Env\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\PatientUser;
use App\Entity\User;


class PatientUserController
{

    #[Route('/patientuser/downloadAttachements/')]
#Ex. http://127.0.0.1:8000/
    public function downloadAttachements(): Response
    {
        return new Response();

    }



    #[Route('/patientuser/askAppointment')]
    public function askAppointment(): Response
    {
        return new Response();

    }
}