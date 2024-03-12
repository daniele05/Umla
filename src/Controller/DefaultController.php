<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

#[Route('/','home', methods:['GET'])]
#Ex. http://127.0.0.1:8000/
    public function home()
{
   return $this->render(view:'default/home.html.twig');

    }


    #[Route('/page/presentation.html')]
    #Ex. http://127.0.0.1:8000/presentation
    public function presentation()
    {
        return new Response();

    }


    #[Route('/page/nosservices.html')]
    #Ex. http://127.0.0.1:8000/nosservices
    public function nosservices()
    {
        return new Response();

    }


    #[Route('/page/forum.html')]
    #Ex. http://127.0.0.1:8000/forum
    public function forum()
    {
        return new Response();

    }
}