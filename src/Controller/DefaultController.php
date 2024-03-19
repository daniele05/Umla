<?php

namespace App\Controller;

use App\Repository\DoctorUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

#[Route('/','home', methods:['GET'])]
#Ex. http://127.0.0.1:8000/
    # en param -> la liste des medecins demandée dans le homepage.
    public function home(DoctorUserRepository $doctorUserRepository)
{

    /*
     * tableau associatif  */
   return $this->render(view:'default/home.html.twig');

   /**'doctorUser'=>$doctorUserRepository->findAll()*/

    }


    #[Route('/page/presentation.html,')]
    #Ex. http://127.0.0.1:8000/presentation
    public function presentation()
    {
        return $this->render(view:"default/presentation.html.twig");

    }


    #[Route('/page/nosservices/nosspecialites.html')]
    #Ex. http://127.0.0.1:8000/nosservices/nosspecialites
    public function nosspecialites(): Response
    {
        return $this->render(view:"default/nosspecialites.html.");

    }
    #[Route('/page/nosservices/medecins.html')]
    #Ex. http://127.0.0.1:8000/nosservices/medecins
    public function medecins(): Response
    {
        return $this->render(view:"default/medecins.html.");

    }
    #[Route('/page/nosservices/videoconsultation.html')]
    #Ex. http://127.0.0.1:8000/nosservices/videosonsulattion
    public function videoconsultation(): Response
    {
        return $this->render(view:"default/videoconsultation.html.");

    }
    #[Route('/page/nosservices/posologie.html')]
    #Ex. http://127.0.0.1:8000/nosservices/posologie
    public function posologie(): Response
    {
        return $this->render(view:"default/posologie.html.");

    }
}