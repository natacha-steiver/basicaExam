<?php
/*
  ./src/Repository/AuteursRepository.php
*/
namespace App\Repository;

use App\Entity\Auteurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * [AuteursRepository description]
 */
class AuteursRepository extends ServiceEntityRepository
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
        parent::__construct($registry, Auteurs::class);
    }


}
