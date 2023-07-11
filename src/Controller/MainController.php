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
        echo "Homepage of site";
        die();
    }

    /**
     * @Route("/other", name="main_home")
     */
    public function otherPage(): Response
    {
        echo "Other page of site";
        die();
    }
}
