<?php

namespace App\Controller;

use App\Repository\VersionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param VersionRepository $versionRepository
     * @return Response
     */
    public function index(VersionRepository $versionRepository): Response
    {
        return $this->render('home/home.html.twig', [
            'versions' => $versionRepository->findAll(),
        ]);
    }
}
