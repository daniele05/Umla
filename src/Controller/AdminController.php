<?php

namespace App\Controller;

use App\Entity\DoctorUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    #[Route('/admin/dashboard')]
    #Ex. http://127.0.0.1:8000/
    public function dashboard()
    {
        return new Response();

    }

    #[Route('/admin/validateUsersRegistration')]
    #Ex. http://127.0.0.1:8000/
    public function validateUsersRegistration()
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