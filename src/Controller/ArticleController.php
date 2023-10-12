<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/articles', name: 'app_articles')]
    public function index(
        ArticleRepository $articleRepository
    ): Response
    {
       $articles = $articleRepository->findBy([], ['datePublication' => 'DESC']);

        return $this->render('article/index.html.twig', [
            'articles' => $articles
        ]);
    }
}
