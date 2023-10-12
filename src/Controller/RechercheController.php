<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RechercheController extends AbstractController
{
    #[Route('/recherche', name: 'app_recherche')]
    public function index(): Response
    {
        return $this->render('recherche/index.html.twig', [
        ]);
    }
    #[Route('/recherche/resultat', name: 'app_resultat')]
    public function resultat(
        ArticleRepository $articleRepository,
        Request $request
    ): Response
    {
        $articles = $articleRepository->search($request->request->get('search'));

        return $this->render('recherche/result.html.twig', [
            'recherche' => $request->request->get('search'),
            'articles' => $articles
        ]);
    }
}
