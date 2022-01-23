<?php
/*
  ./src/Entity/Pages.php
*/
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pages
 *
 * @ORM\Table(name="pages")
 * @ORM\Entity
 */
class Pages
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
     * @ORM\Column(name="titrefr", type="string", length=45, nullable=false)
     */
    private $titrefr;

    /**
     * @var string
     *
     * @ORM\Column(name="titreen", type="string", length=45, nullable=false)
     */
    private $titreen;

    /**
     * @var string|null
     *
     * @ORM\Column(name="textefr", type="text", length=65535, nullable=true)
     */
    private $textefr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="texteen", type="text", length=65535, nullable=true)
     */
    private $texteen;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }


}
