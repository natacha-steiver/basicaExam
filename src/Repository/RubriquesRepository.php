<?php
/*
  ./src/Repository/RubriquesRepository.php
*/
namespace App\Repository;

use App\Entity\Rubriques;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * [RubriquesRepository description]
 */
class RubriquesRepository extends ServiceEntityRepository
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
        parent::__construct($registry, Rubriques::class);
    }


}
