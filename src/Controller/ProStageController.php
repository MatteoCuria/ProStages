<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Stage;
use App\Entity\Formation;
use App\Entity\Entreprise;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="pro_stage")
     */
    public function index(): Response
    {
       // Récupérer le perository de l'entité Stage
       $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

       // Récupérer les ressources enregistrées en BD
        $stages = $repositoryStage->findAll();

       // Envoyer les stages récupérés à la vue chargée de les afficher
       return $this->render('pro_stage/index.html.twig', ['stages' => $stages]);
    }

     /**
     * @Route("/entreprises", name="entreprises")
     */
    public function afficherEntreprises(): Response
    {
        return $this->render('pro_stage/afficherParEntreprises.html.twig');
    }

    /**
     * @Route("/Formations", name="formations")
     */
    public function afficherFormations(): Response
    {
        return $this->render('pro_stage/afficherParFormations.html.twig');
    }

    /**
     * @Route("/stage/{id}", name="descriptionStage")
     */
    public function afficherDescriptifStage($id): Response
    {
        return $this->render('pro_stage/afficherDescriptifStage.html.twig',
      ['idStage' => $id]);
    }
}
