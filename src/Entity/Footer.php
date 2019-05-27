<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FooterRepository")
 */
class Footer
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
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description1;

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
    private $linkyo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkgo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

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

    public function getDescription1(): ?string
    {
        return $this->description1;
    }

    public function setDescription1(string $description1): self
    {
        $this->description1 = $description1;

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

    public function getLinkyo(): ?string
    {
        return $this->linkyo;
    }

    public function setLinkyo(string $linkyo): self
    {
        $this->linkyo = $linkyo;

        return $this;
    }

    public function getLinkgo(): ?string
    {
        return $this->linkgo;
    }

    public function setLinkgo(string $linkgo): self
    {
        $this->linkgo = $linkgo;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDescription2(): ?string
    {
        return $this->description2;
    }

    public function setDescription2(string $description2): self
    {
        $this->description2 = $description2;

        return $this;
    }
}
