<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface; 
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 * fields={"adresseemail"},
 * message="L'email que vous avez indique est deja utilise!"
 * )
 */
class User_old implements UserInterface 
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
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numtel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkfb;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linktw;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkins;

    /**
     * @ORM\Column(type="string", length=255)
     *  
     */
    private $adresseemail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datedenaissance;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8", minMessage="Votre mot de passe doit faire minimum 8 caracteres ")
     * @Assert\EqualTo(propertyPath="confirm_password",message="Votre mot de passe doit etre le meme que celui que vous confirmez")
     */
    private $motdepasse;
    /**
       * @Assert\EqualTo(propertyPath="motdepasse",message="Votre mot de passe doit etre le meme que celui que vous confirmez")
     */
    public $confirm_password;

    /**
     * @ORM\Column(type="string", length=255)
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumtel(): ?string
    {
        return $this->numtel;
    }

    public function setNumtel(string $numtel): self
    {
        $this->numtel = $numtel;

        return $this;
    }

    public function getLinkfb(): ?string
    {
        return $this->linkfb;
    }

    public function setLinkfb(string $linkfb): self
    {
        $this->linkfb = $linkfb;

        return $this;
    }

    public function getLinktw(): ?string
    {
        return $this->linktw;
    }

    public function setLinktw(string $linktw): self
    {
        $this->linktw = $linktw;

        return $this;
    }

    public function getLinkins(): ?string
    {
        return $this->linkins;
    }

    public function setLinkins(string $linkins): self
    {
        $this->linkins = $linkins;

        return $this;
    }

    public function getAdresseemail(): ?string
    {
        return $this->adresseemail;
    }

    public function setAdresseemail(string $adresseemail): self
    {
        $this->adresseemail = $adresseemail;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDatedenaissance(): ?\DateTimeInterface
    {
        return $this->datedenaissance;
    }

    public function setDatedenaissance(\DateTimeInterface $datedenaissance): self
    {
        $this->datedenaissance = $datedenaissance;

        return $this;
    }

    public function getMotdepasse(): ?string
    {
        return $this->motdepasse;
    }

    public function setMotdepasse(string $motdepasse): self
    {
        $this->motdepasse = $motdepasse;

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

    public function eraseCredentials() { return NULL;}

    public function getSalt() {
        return null;
    }
    
    public function getUsername() {}
    
    public function getPassword() {}
    
    public function getRoles(){
        return ['ROLE_ADMIN'];
    }
    

     
    public function serialize()
    { 
    }
    

     
    public function unserialize($serialized)
    {
         return null;
    }


}
