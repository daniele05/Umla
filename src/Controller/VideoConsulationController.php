<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class VideoConsulationController extends AbstractController
{
    public function index(): Response
    {
       return $this->render('default/videoconsultation.html.twig');
}
}