<?php

namespace App\Controller;

use App\Entity\DoctorUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{


    #[Route('/admin/validateDoctorUserRegistration')]
    #Ex. http://127.0.0.1:8000/
    public function validateDoctorUserRegistration()
    {
        $doctoruser= new DoctorUser();
        $doctoruser->setFirstName();
        return new Response();

    }
    #[Route('/admin/manageUsers')]
    #Ex. http://127.0.0.1:8000/
    public function manageUsers()
    {
        return new Response();

    }




}