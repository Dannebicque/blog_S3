<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestArticleController extends AbstractController
{
    #[Route('/test/article', name: 'app_test_article')]
    public function index(
        EntityManagerInterface $entityManager
    ): Response
    {
        $article1 = new Article();
        $article1->setTitre('Titre 1');
        $article1->setTexte('Texte 1');
        $article1->setAuteur('John Doe');
        $article1->setImage('image1.png');
        $article1->setDatePublication(new \DateTime());
        $entityManager->persist($article1);

        $article2 = new Article();
        $article2->setTitre('Titre 2');
        $article2->setTexte('Texte 2');
        $article2->setAuteur('John Doe');
        $article2->setImage('image2.png');
        $article2->setDatePublication(new \DateTime());
        $entityManager->persist($article2);

        $article3 = new Article();
        $article3->setTitre('Titre 3');
        $article3->setTexte('Texte 3');
        $article3->setAuteur('John Doe');
        $article3->setImage('image3.png');
        $article3->setDatePublication(new \DateTime());
        $entityManager->persist($article3);

        // ajouter article2 et article3

        $entityManager->flush();


        return $this->render('test_article/index.html.twig', [
            'controller_name' => 'TestArticleController',
        ]);
    }
}
