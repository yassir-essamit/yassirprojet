<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Client;


class BackEndController extends AbstractController
{
    /**
     * @Route("/backend", name="back_end")
     */
    public function index(): Response
    {
        return $this->render('back_end/index.html.twig', [
            'controller_name' => 'BackEndController',
        ]);
    }

    /**
     * @Route("/clients", name="liste_clients")
     */
     public function Client( ClientRepository $repo)
     {
         return $this->render('back_end/Client.html.twig', [
             'clients' => $repo->findAll(),
         ]);
     }

   /**
     * @Route("/clients/{id}/delete", name="deleteC")
     */
     public function deleteC(Client $client , EntityManagerInterface $manager)
     {
         $manager->remove($client);
         $manager ->flush();
         return $this->redirectToRoute('liste_clients');
 
     }
}
