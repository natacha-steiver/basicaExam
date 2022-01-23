<?php
/*
  ./src/Repository/TagsRepository.php
*/
namespace App\Repository;

use App\Entity\Tags;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * [TagsRepository description]
 */
class TagsRepository extends ServiceEntityRepository
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
        parent::__construct($registry, Tags::class);
    }


}
