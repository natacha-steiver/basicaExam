<?php
/*
  ./src/Repository/PagesRepository.php
*/
namespace App\Repository;

use App\Entity\Pages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * [PagesRepository description]
 */
class PagesRepository extends ServiceEntityRepository
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
        parent::__construct($registry, Pages::class);
    }


}
