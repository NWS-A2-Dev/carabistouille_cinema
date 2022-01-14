<?php

namespace App\Controller;

use App\Entity\Poster;
use App\Form\PosterFormType;
use App\Repository\PosterRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PosterController extends AbstractController
{
    #[Route('/poster', name: 'poster')]
    public function index(PosterRepository $repo, ManagerRegistry $mr, Request $r): Response
    {
        $form = $this->createForm(PosterFormType::class);

        $form->handleRequest($r);
        if ($form->isSubmitted() && $form->isValid())
        {
            $t = $form->getData();
            $manager = $mr->getManager();

            $manager->persist($t);
            $manager->flush();
        }

        $posters = $repo->findAll();

        return $this->render('poster/index.html.twig', [
            'controller_name' => 'PosterController',
            'form' => $form->createView(),
            'posters' => $posters
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

    #[Route('/poster_agrandir/{id}', name: 'poster_get')]
    public function agrandir(ManagerRegistry $mr, PosterRepository $repo, $id): Response
    {
        $manager = $mr->getManager();
        $poster = $repo->find($id);

        $poster->setTaille($poster->getTaille() + 1);

        $manager->persist($poster);
        $manager->flush();

        //die();

        return $this->render('poster/index.html.twig', [
            'controller_name' => 'PosterController',
        ]);
    }

    #[Route('/poster_delete/{id}', name: 'poster_get')]
    public function delete(ManagerRegistry $mr, PosterRepository $repo, $id): Response
    {
        $manager = $mr->getManager();
        $poster = $repo->find($id);

        $manager->remove($poster);
        $manager->flush();

        //die();

        return $this->render('poster/index.html.twig', [
            'controller_name' => 'PosterController',
        ]);
    }
}
