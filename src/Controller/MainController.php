<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_home")
     */
    public function home(): Response
    {
        echo "coucou";
        die();
    }

    /**
     * @Route("/test", name="main_home")
     */
    public function test(): Response
    {
        echo "Voici mon test";
        die();
    }
}
