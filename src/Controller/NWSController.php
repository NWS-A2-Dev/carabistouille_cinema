<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NWSController extends AbstractController
{
    #[Route('/owo', name: 'nws')]
    public function index(): Response
    {
        $url = "https://i.pinimg.com/originals/2c/f8/1b/2cf81b521df6033b443550a25292c8ed.jpg";

        return $this->render('nws/index.html.twig', [
            'image' => $url,
        ]);
    }
}
