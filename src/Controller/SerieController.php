<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/series", name="serie_")
 */

class SerieController extends AbstractController
{
    /**
     * @Route("/", name="list")
     */
    public function list(): Response
    {
        //todo: get series from DB

        return $this->render('serie/liste.html.twig', [

        ]);
    }

    /**
     * @Route("/details/{id}", name="details")
     */
    public function details(int $id): Response
    {
        //todo: Get serie from DB

        return $this->render('serie/details.html.twig');
    }

    /**
     * @Route("/create", name="create")
     */
    public function create(): Response
    {
        //todo: Get serie from DB

        return $this->render('serie/create.html.twig');
    }
}

