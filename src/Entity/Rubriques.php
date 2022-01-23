<?php
/*
  ./src/Entity/Rubriques.php
*/
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rubriques
 *
 * @ORM\Table(name="rubriques")
 * @ORM\Entity
 */
class Rubriques
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
     * @ORM\Column(name="titreFr", type="string", length=45, nullable=false)
     */
    private $titrefr;

    /**
     * @var string
     *
     * @ORM\Column(name="titreEn", type="string", length=45, nullable=false)
     */
    private $titreen;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=45, nullable=false)
     */
    private $slug;

    /**
     * @var string|null
     *
     * @ORM\Column(name="texteFr", type="text", length=65535, nullable=true)
     */
    private $textefr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="texteEn", type="text", length=65535, nullable=true)
     */
    private $texteen;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=45, nullable=true)
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitrefr(): ?string
    {
        return $this->titrefr;
    }

    public function setTitrefr(string $titrefr): self
    {
        $this->titrefr = $titrefr;

        return $this;
    }

    public function getTitreen(): ?string
    {
        return $this->titreen;
    }

    public function setTitreen(string $titreen): self
    {
        $this->titreen = $titreen;

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

    public function getTextefr(): ?string
    {
        return $this->textefr;
    }

    public function setTextefr(?string $textefr): self
    {
        $this->textefr = $textefr;

        return $this;
    }

    public function getTexteen(): ?string
    {
        return $this->texteen;
    }

    public function setTexteen(?string $texteen): self
    {
        $this->texteen = $texteen;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }


}
