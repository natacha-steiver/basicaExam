<?php
/*
  ./src/Entity/Posts.php
*/
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
/**
 * Posts
 *
 * @ORM\Table(name="posts", indexes={@ORM\Index(name="fk_posts_comptes1_idx", columns={"comptes"})})
 * @ORM\Entity
 */
 // use Symfony\Component\HttpFoundation\File\File;
 use Vich\UploaderBundle\Mapping\Annotation as Vich;

 /**
  * @ORM\Entity(repositoryClass="App\Repository\PostsRepository")
  * @Vich\Uploadable
  */
class Posts
{

      /**
       * @var string
       *
       * @ORM\Column(name="image", type="string", length=45, nullable=false)
       */
  private $image;

  /**
 * NOTE: This is not a mapped field of entity metadata, just a simple property.
 *
 * @Vich\UploadableField(mapping="property_image", fileNameProperty="image", size="imagesize")
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
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=45, nullable=true)
     */
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
     * @var string
     *
     * @ORM\Column(name="imagesize", type="string", length=45, nullable=false)
     */
    private $imagesize;

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
     * @var \Comptes
     *
     * @ORM\ManyToOne(targetEntity="Comptes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="comptes", referencedColumnName="id")
     * })
     */
    private $comptes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Categories", mappedBy="posts")
     */
    private $categories;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function setImageSize(string $imagesize = null): self
    {
        $this->imagesize = $imagesize;

        return $this;
    }


        public function getimagesize(): ?string
        {
            return $this->imagesize;
        }

        public function setSlug(string $slug): self
        {
            $this->slug = $slug;

            return $this;
        }


    public function getComptes(): ?Comptes
    {
        return $this->comptes;
    }

    public function setComptes(?Comptes $comptes): self
    {
        $this->comptes = $comptes;

        return $this;
    }

    /**
     * @return Collection|Categories[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categories $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addPost($this);
        }

        return $this;
    }

    public function removeCategory(Categories $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
            $category->removePost($this);
        }

        return $this;
    }
    public function getImageFile(): ?File
    {
        return $this->imagefile;
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
