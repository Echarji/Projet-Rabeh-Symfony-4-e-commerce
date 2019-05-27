<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Livre", mappedBy="id_categori")
     */
    private $livres;

    public function __construct()
    {
        $this->livres = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return Collection|Livre[]
     */
    public function getLivres(): Collection
    {
        return $this->livres;
    }

    public function addLivre(Livre $livre): self
    {
        if (!$this->livres->contains($livre)) {
            $this->livres[] = $livre;
            $livre->setIdCategori($this);
        }

        return $this;
    }

    public function removeLivre(Livre $livre): self
    {
        if ($this->livres->contains($livre)) {
            $this->livres->removeElement($livre);
            // set the owning side to null (unless already changed)
            if ($livre->getIdCategori() === $this) {
                $livre->setIdCategori(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->nom;
    }
}
