<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Stage;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Repository\StageRepository;
use App\Repository\EntrepriseRepository;
use App\Repository\FormationRepository;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="pro_stage")
     */
    public function index(StageRepository $repositoryStage): Response
    {

       // Récupérer les ressources enregistrées en BD
        $stages = $repositoryStage->findAll();

       // Envoyer les stages récupérés à la vue chargée de les afficher
       return $this->render('pro_stage/index.html.twig', ['stages' => $stages]);
    }

    /**
     * @Route("/entreprises", name="entreprises")
     */
    public function entreprises(EntrepriseRepository $repositoryEntreprise): Response
    {

        // Récupérer toutes les entreprises enregistrées en BD
        $entreprises = $repositoryEntreprise->findAll();

        return $this->render('pro_stage/entreprises.html.twig', ['entreprises' => $entreprises]);
    }

    /**
     * @Route("/formations", name="formations")
     */
    public function formations(FormationRepository $repositoryFormation): Response
    {

        // Récupérer toutes les entreprises enregistrées en BD
        $formations = $repositoryFormation->findAll();

        return $this->render('pro_stage/formations.html.twig', ['formations' => $formations]);
    }

     /**
     * @Route("/entreprises/{id}", name="stageParEntreprises")
     */
    public function afficherEntreprises(EntrepriseRepository $repositoryEntreprise, $id): Response
    {
   

       $entreprise = $repositoryEntreprise->find($id);

       return $this->render('pro_stage/afficherParEntreprises.html.twig', ['entreprise' => $entreprise]);
    }

    /**
     * @Route("/formations/{id}", name="stageParFormations")
     */
    public function afficherFormations(FormationRepository $repositoryFormation, $id): Response
    {

        // Récupérer la formation
        $formation = $repositoryFormation->find($id);

        // On envoie ces données à la page
        return $this->render('pro_stage/afficherParFormations.html.twig', ['formation' => $formation]);
    }

    /**
     * @Route("/stage/{id}", name="descriptionStage")
     */
    public function afficherDescriptifStage(Stage $stage): Response
    {
        return $this->render('pro_stage/afficherDescriptifStage.html.twig', ['stage' => $stage]);
    }
}
