<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AcheterRepository")
 */
class Acheter
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_user;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_livre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getIdLivre(): ?int
    {
        return $this->id_livre;
    }

    public function setIdLivre(int $id_livre): self
    {
        $this->id_livre = $id_livre;

        return $this;
    }
}
