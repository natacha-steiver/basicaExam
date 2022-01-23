<?php
/*
  ./src/Repository/ComptesRepository.php
*/
namespace App\Repository;

use App\Entity\Comptes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * [ComptesRepository description]
 */
class ComptesRepository extends ServiceEntityRepository
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
        parent::__construct($registry, Comptes::class);
    }


}
