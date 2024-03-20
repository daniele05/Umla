<?php

namespace App\Controller;

use App\Entity\Speciality;
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


    #[Route('/page/presentation.html.',methods: ['GET'])]
    #Ex. http://127.0.0.1:8000/presentation
    public function presentation()
    {
        return $this->render(view:'default/presentation.html.twig');

    }

    #[Route('/page/specialites{slug}.html.twig',methods: ['GET'])]
    #Ex. http://127.0.0.1:8000page/specialites/orthopedie
    #{slug} represente un paramètre de la route
    public function specialites($slug)
    {
        $specialite = $this->getDoctrine()->getRepository(Speciality::class)->findOneBy(['slug'=>$slug]);
        if(!$specialite){
            throw  $this->createNotFoundException('Spécialité non trouvée pour le slug:'.$slug);
        }
        // Exemple de données à passer à la vue
        $data = [
            'specialite' => $specialite,
        ];

        return $this->render(view:'default/specialites.html.' , parameters: ['slug' => $slug]);

    }
    #[Route('/page/nosservices/medecins.html',methods: ['GET'])]
    #Ex. http://127.0.0.1:8000/nosservices/medecins
    public function medecins(): Response
    {
        return $this->render(view:'default/medecins.html.');

    }
    #[Route('/videoconsultation.html',methods: ['GET'])]
    #Ex. http://127.0.0.1:8000/nosservices/videosonsulattion
    public function videoconsultation(): Response
    {
        return $this->render(view:'default/videoconsultation.html.');

    }
    #[Route('/page/nosservices/posologie.html',methods: ['GET'])]
    #Ex. http://127.0.0.1:8000/nosservices/posologie
    public function posologie(): Response
    {
        return $this->render(view:'default/posologie.html.');

    }
}