<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/home", name="main_home")
     */
    public function home()
    {
        return $this->render("main/home.html.twig");
    }

    /**
     * @Route("/other", name="main_other")
     */
    public function otherPage()
    {
        $serie = [
            "title" => "Game of Thrones",
            "year" => 2012,
        ];

        return $this->render("main/other.html.twig", [
            "mySerie" => $serie,
        ]);
    }
}
