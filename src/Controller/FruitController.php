<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Fruit;

class FruitController extends AbstractController
{
    #[Route('/fruit', name: 'fruit')]
    public function index(): Response
    {
        $fruits = [
            new Fruit("Fraise", "Rouge"),
            new Fruit("Pomme", "Vert"),
            new Fruit("Melon", "Vert"),
            new Fruit("Haricot Vert", "Rouge")
        ];

        return $this->render('fruit/index.html.twig', [
            'controller_name' => 'FruitController',
            'fruits' => $fruits
        ]);
    }
}
