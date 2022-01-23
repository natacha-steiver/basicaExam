<?php
/*
  ./src/Entity/Works.php
*/
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Works
 *
 * @ORM\Table(name="works", indexes={@ORM\Index(name="fk_works_clients_idx", columns={"clients"}), @ORM\Index(name="fk_works_auteurs1_idx", columns={"auteurs"})})
 * @ORM\Entity
 */

 // use Symfony\Component\HttpFoundation\File\File;
 use Vich\UploaderBundle\Mapping\Annotation as Vich;

 /**
  * @ORM\Entity(repositoryClass="App\Repository\WorksRepository")
  * @Vich\Uploadable
  */
class Works
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
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=45, nullable=true)
     */
    private $image;


      /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="property_work", fileNameProperty="image", size="imagesize")
     *
     * @var File|null
     */
        private $imagefile ;

        /**
         * @ORM\Column(type="datetime")
         *
         * @var \DateTime|null
         */
        private $updatedAt;


        /**
         * @var string
         *
         * @ORM\Column(name="imagesize", type="string", length=45, nullable=false)
         */
        private $imagesize;

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
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_creation", type="datetime", nullable=true)
     */
    private $dateCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=45, nullable=false)
     */
    private $slug;

    /**
     * @var \Auteurs
     *
     * @ORM\ManyToOne(targetEntity="Auteurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="auteurs", referencedColumnName="id")
     * })
     */
    private $auteurs;

    /**
     * @var \Clients
     *
     * @ORM\ManyToOne(targetEntity="Clients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="clients", referencedColumnName="id")
     * })
     */
    private $clients;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tags", inversedBy="works")
     * @ORM\JoinTable(name="works_has_tags",
     *   joinColumns={
     *     @ORM\JoinColumn(name="works", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tags", referencedColumnName="id")
     *   }
     * )
     */
    private $tags;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

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

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

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

    public function getAuteurs(): ?Auteurs
    {
        return $this->auteurs;
    }

    public function setAuteurs(?Auteurs $auteurs): self
    {
        $this->auteurs = $auteurs;

        return $this;
    }

    public function getClients(): ?Clients
    {
        return $this->clients;
    }

    public function setClients(?Clients $clients): self
    {
        $this->clients = $clients;

        return $this;
    }

    /**
     * @return Collection|Tags[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tags $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    public function removeTag(Tags $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
        }

        return $this;
    }


      public function getUpdatedAt(): ?\DateTimeInterface
      {
          return $this->updatedAt;
      }

      public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
      {
        $this->updatedAt = $updatedAt;

          return $this;
      }


      public function setImageSize(string $imagesize = null): self
      {
          $this->imagesize = $imagesize;

          return $this;
      }


          public function getimagesize(): ?string
          {
              return $this->imagesize;
          }

              public function setImageFile(?File $imagefile): self
              {
                  $this->imagefile = $imagefile;
                  // Only change the updated af if the file is really uploaded to avoid database updates.
                  // This is needed when the file should be set when loading the entity.
                  if ($this->imagefile instanceof UploadedFile) {
                      $this->updatedAt = new \DateTime('now');
                  }
                  return $this;
              }
              public function __toString()
              	{
              		return $this->titrefr;

              	}
}
