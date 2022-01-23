<?php
/*
  ./src/Repository/WorksRepository.php
*/
namespace App\Repository;

use App\Entity\Works;
use App\Entity\Tags;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * [WorksRepository description]
 */
class WorksRepository extends ServiceEntityRepository
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
        parent::__construct($registry, Works::class);
    }

/**
 * [findByTag description]
 * @param  int    $id [description]
 * @return [type]     [description]
 */
public function findByTag(int $id){
  /**
   * [$conn description]
   * @var [type]
   */
  $conn = $this->getEntityManager()->getConnection();

     $sql = '
     SELECT DISTINCT w.id,w.titrefr,w.image,w.titreen,w.slug FROM works w

     JOIN works_has_tags ON w.id = works

     JOIN tags ON tags.id = works_has_tags.tags
     WHERE works_has_tags.tags IN (select works_has_tags.tags from works_has_tags where works_has_tags.works = :id   ORDER BY nombreTagsPartage DESC)
     AND  works_has_tags.works != :id



         ';
     $stmt = $conn->prepare($sql);
     $stmt->execute(['id' => $id]);

     // returns an array of arrays (i.e. a raw data set)
     return $stmt->fetchAll();

}
}
