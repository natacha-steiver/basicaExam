<?php
/*
  ./src/Repository/PostsRepository.php
*/
namespace App\Repository;

use App\Entity\Posts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * [PostsRepository description]
 */
class PostsRepository extends ServiceEntityRepository
{
    /**
     * [__construct description]
     * @param RegistryInterface $registry [description]
     */
    public function __construct(RegistryInterface $registry)
    {
        /**
         * [parent description]
         * @var [type]
         */
        parent::__construct($registry, Posts::class);
    }
    /**
     * [findByCompte description]
     * @param  [type] $facebook [description]
     * @param  [type] $twitter  [description]
     * @param  [type] $limit    [description]
     * @return [type]           [description]
     */
    public function findByCompte($facebook,$twitter,$limit) {
                  /**
                   * [$qb description]
                   * @var [type]
                   */
                  $qb= $this->createQueryBuilder('p');

                  $qb-> join('p.comptes','c')

                  ->andWhere('c.nom LIKE :facebook OR c.nom LIKE :twitter ')

                  ->setParameter('facebook', '%'.$facebook.'%')
                  ->setParameter('twitter', '%'.$twitter.'%')
                  ->orderBy('p.dateCreation', 'DESC')

                  ->setMaxResults($limit);
                  return $qb->getQuery()->getResult() ;
              ;

              }

          /**
           * [findByOtherCompte description]
           * @param  [type] $autre [description]
           * @param  [type] $limit [description]
           * @return [type]        [description]
           */
          public function findByOtherCompte($autre,$limit) {
              /**
               * [$qb description]
               * @var [type]
               */
              $qb= $this->createQueryBuilder('p');


              $qb -> join('p.comptes','c')

              ->andWhere('c.nom LIKE :autre')

              ->setParameter('autre', '%'.$autre.'%')
              ->orderBy('p.dateCreation', 'DESC')

              ->setMaxResults($limit);
              return $qb->getQuery()->getResult() ;



              }
}
