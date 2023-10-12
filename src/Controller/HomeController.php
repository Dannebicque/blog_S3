<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        CategorieRepository $categorieRepository,
        ArticleRepository   $articleRepository
    ): Response
    {
        $article = $articleRepository->findOneBy([], ['datePublication' => 'DESC']);

        return $this->render('home/index.html.twig', [
            'article' => $article,
            'categories' => $categorieRepository->findAll()
        ]);
    }
}
