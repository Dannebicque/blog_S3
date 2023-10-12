<?php

namespace App\Controller;

use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    #[Route('/categorie/{categorie}', name: 'app_categorie')]
    public function index(
        Categorie $categorie
    ): Response
    {
        return $this->render('categorie/index.html.twig', [
            'categorie' => $categorie,
            'articles' => $categorie->getArticles()
        ]);
    }
}
