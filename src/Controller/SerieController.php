<?php

namespace App\Controller;

use App\Entity\Series;
use App\Form\SerieType;
use App\Repository\SeriesRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/series", name="serie_")
 */

class SerieController extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function list(SeriesRepository $serieRepo): Response
    {
        //get series from DB
        $series = $serieRepo->findBestSeries();

        return $this->render('serie/liste.html.twig', [
            "series" => $series

        ]);
    }

    /**
     * @Route("/details/{id}", name="details")
     */
    public function details(int $id, SeriesRepository $serieRepo): Response
    {
        //get serie from DB
        $serie = $serieRepo->find($id);

        return $this->render('serie/details.html.twig', [
        "serie" => $serie
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $serie = new Series();
        $serie->setDateCreated(new \DateTime());
        $serieForm = $this->createForm(SerieType::class, $serie);

        $serieForm->handleRequest($request);
        
        if ($serieForm->isSubmitted() && $serieForm->isValid()) { 
            $em->persist($serie);
            $em->flush();

            $this->addFlash('sucess', 'New serie added.');
            return $this->redirectToRoute('serie_details', ['id' => $serie->getId()]);
        }

        /*
        $serieForm->handleRequest($request);

        if($serieForm->isSubmitted()) {
            $em->persist($serie);
            $em->flush();

            $this->addFlash('sucess', 'New serie added.');
            return $this->redirectToRoute('serie_details', ['id' => $serie->getId()]);
        }
        */
        

        return $this->render('serie/create.html.twig', [
            'serieForm' => $serieForm->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(Series $serie, EntityManagerInterface $em)
    {
        $em->remove($serie);
        $em->flush();

        return $this->redirectToRoute('main_home');
    }

    /**
     * @Route("/demo", name="demo")
     */
    /*public function addDemo(EntityManagerInterface $em): Response
    {
        //Create Entity instance
        $serie = new Series();

        //Hydrate all properties
        $serie->setName('Game of Thrones');
        $serie->setBackdrop('aaaa');
        $serie->setPoster('img/the_good_doctor.jpg');
        $serie->setDateCreated(new \DateTime());
        $serie->setFirstAirDate(new \DateTime("- 12 years"));
        $serie->setLastAirDate(new \DateTime("- 4 years"));
        $serie->setGenres('fantasy');
        $serie->setOverview('Seven noble families fight for control of the mythical land of Westeros. Friction between the houses leads to full-scale war. All while a very ancient evil awakens in the farthest north. Amidst the war, a neglected military order of misfits, the Night\'s Watch, is all that stands between the realms of men and icy horrors beyond.');
        $serie->setPopularity(100.00);
        $serie->setVote(6.5);
        $serie->setStatus('ended');
        $serie->setTmdbId(1399);

        dump($serie);

        $em->persist($serie);
        $em->flush();

        return $this->render('serie/demo.html.twig');
    }*/
}

