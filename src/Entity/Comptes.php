<?php
/*
  ./src/Entity/Comptes.php
*/
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comptes
 *
 * @ORM\Table(name="comptes")
 * @ORM\Entity
 */
class Comptes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=45, nullable=false)
     */
    private $slug;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function __toString()
    	{
    		return $this->nom;
    	}
}
