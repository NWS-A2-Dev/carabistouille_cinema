<?php

namespace App\Controller;

use App\Entity\Tshirt;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TshirtController extends AbstractController
{
    /**
     * @Route("/tshirt", name="tshirt")
     */
    public function index(): Response
    {
        $shirts = [
            new Tshirt(1, "Renard Chanceux", 12, "Vert"),
            new Tshirt(2, "Renard Moche", 12, "Blanc"),
            new Tshirt(3, "Chat Gentil", 12, "Rouge"),
            new Tshirt(4, "Loup Grognon", 12, "Gris"),
        ];

        return $this->render('tshirt/index.html.twig', [
            'controller_name' => 'TshirtController',
            'tshirts' => $shirts
        ]);
    }

    /**
     * @Route("/tshirt/{id}", name="tshirt_details")
     */
    public function details($id): Response
    {
        $shirts = [
            new Tshirt(1, "Renard Chanceux", 12, "Vert"),
            new Tshirt(2, "Renard Moche", 12, "Blanc"),
            new Tshirt(3, "Chat Gentil", 12, "Rouge"),
            new Tshirt(4, "Loup Grognon", 12, "Gris"),
        ];

        $result = array_filter($shirts, function($tshirt) use ($id)
        {
            return $tshirt->Id == $id;
        });


        return $this->render('tshirt/index.html.twig', [
            'controller_name' => 'TshirtController',
            'tshirts' => $result
        ]);
    }
}
