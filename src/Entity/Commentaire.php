<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $pseudo = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $avis = null;

    #[ORM\Column(nullable: true)]
    private ?bool $estValide = null;

    #[ORM\ManyToOne(targetEntity: Zoo::class)]
    private ?Zoo $zoo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getAvis(): ?string
    {
        return $this->avis;
    }

    public function setAvis(string $avis): static
    {
        $this->avis = $avis;

        return $this;
    }

    public function isEstValide(): ?bool
    {
        return $this->estValide;
    }

    public function setEstValide(?bool $estValide): static
    {
        $this->estValide = $estValide;

        return $this;
    }

    /**
     * Get the value of zoo
     */
    public function getZoo()
    {
        return $this->zoo;
    }

    /**
     * Set the value of zoo
     *
     * @return  self
     */
    public function setZoo($zoo)
    {
        $this->zoo = $zoo;

        return $this;
    }
}
