<?php

namespace App\Controller;

use App\Entity\Poster;
use App\Repository\PosterRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PosterController extends AbstractController
{
    #[Route('/poster', name: 'poster')]
    public function index(PosterRepository $repo): Response
    {
        dd($repo->findAll());

        return $this->render('poster/index.html.twig', [
            'controller_name' => 'PosterController',
        ]);
    }

    #[Route('/poster/{nom}/{prix}', name: 'poster_add')]
    public function ajout(ManagerRegistry $mr, $nom, $prix): Response
    {
        $manager = $mr->getManager();

        $poster = new Poster();
        $poster
            ->setNom($nom)
            ->setTaille(42)
            ->setPrix($prix)
            ->setDescription("OwO");

        $manager->persist($poster);
        $manager->flush();

        dd($poster);
        //die();

        return $this->render('poster/index.html.twig', [
            'controller_name' => 'PosterController',
        ]);
    }

    #[Route('/poster/{id}', name: 'poster_get')]
    public function get(PosterRepository $repo, $id): Response
    {
        $poster = $repo->find($id);
        dd($poster);
        //die();

        return $this->render('poster/index.html.twig', [
            'controller_name' => 'PosterController',
        ]);
    }
}