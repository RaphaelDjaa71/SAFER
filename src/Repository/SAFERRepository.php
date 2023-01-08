<?php

namespace App\Repository;

use App\classe\search;
use App\Entity\Bien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bien>
 *
 * @method Bien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bien[]    findAll()
 * @method Bien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SAFERRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bien::class);
    }

    public function save(Bien $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Bien $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Requête permettant de récupérer les produits en fonction de la recherche de l'utilisateur
     * @return Bien[]
     */
    public function findWithSearch (search $search)
    {
        $query = $this
            ->createQueryBuilder('b')
            ->select('c','t', 'b')
            ->join('b.Categorie', 'c')
            ->join('b.type', 't');

        if (!empty($search->categories)){
            $query = $query
                ->andWhere('c.id IN (:categories)')
                ->setParameter('categories', $search->categories);
        }

        if (!empty($search->types)){
            $query = $query
                ->andWhere('t.id IN (:type)')
                ->setParameter('type', $search->types);
        }

        if (!empty($search->string)){
            $query = $query
                ->andWhere('b.Intitule LIKE :string')
                ->setParameter('string', "%{$search->string}%"); // recherche partielle sur search->string
        }

        return $query->getQuery()->getResult();
    }


//    /**
//     * @return Bien[] Returns an array of Bien objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

    public function findOneBySlug($slug): ?Bien
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
