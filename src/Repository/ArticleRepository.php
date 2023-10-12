<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Article>
 *
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function search(string $words): array
    {
        // SELECT * FROM article AS a WHERE texte LIKE "%$words%" or titre LIKE "%$words%" ORDER BY date_publication DESC
        $query = $this->createQueryBuilder('article') //SELECT * FROM article AS a
            ->where('article.texte LIKE :words') //texte LIKE "%$words%"
            ->orWhere('article.titre LIKE :words') //or titre LIKE "%$words%"
            ->orderBy('article.datePublication', 'DESC') //ORDER BY date_publication DESC
            ->setParameter('words', '%'.$words.'%');

        return $query->getQuery()->getResult();
    }
}
