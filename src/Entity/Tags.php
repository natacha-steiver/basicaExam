<?php
/*
  ./src/Entity/Tags.php
*/
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tags
 *
 * @ORM\Table(name="tags")
 * @ORM\Entity
 */
class Tags
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
     * @ORM\Column(name="nomFr", type="string", length=45, nullable=false)
     */
    private $nomfr;

    /**
     * @var string
     *
     * @ORM\Column(name="nomEn", type="string", length=45, nullable=false)
     */
    private $nomen;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=45, nullable=false)
     */
    private $slug;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreTagsPartage", type="integer", nullable=false)
     */
    private $nombretagspartage;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Works", mappedBy="tags")
     */
    private $works;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->works = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomfr(): ?string
    {
        return $this->nomfr;
    }

    public function setNomfr(string $nomfr): self
    {
        $this->nomfr = $nomfr;

        return $this;
    }

    public function getNomen(): ?string
    {
        return $this->nomen;
    }

    public function setNomen(string $nomen): self
    {
        $this->nomen = $nomen;

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

    public function getNombretagspartage(): ?int
    {
        return $this->nombretagspartage;
    }

    public function setNombretagspartage(int $nombretagspartage): self
    {
        $this->nombretagspartage = $nombretagspartage;

        return $this;
    }

    /**
     * @return Collection|Works[]
     */
    public function getWorks(): Collection
    {
        return $this->works;
    }

    public function addWork(Works $work): self
    {
        if (!$this->works->contains($work)) {
            $this->works[] = $work;
            $work->addTag($this);
        }

        return $this;
    }

    public function removeWork(Works $work): self
    {
        if ($this->works->contains($work)) {
            $this->works->removeElement($work);
            $work->removeTag($this);
        }

        return $this;
    }
    public function __toString()
    	{
    		return $this->nomfr;
    	}
}
