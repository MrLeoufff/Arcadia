<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $prenom = null;

    #[ORM\Column(length: 50)]
    private ?string $race = null;

    #[ORM\Column(length: 100)]
    private ?string $image_princ = null;

    #[ORM\ManyToOne(targetEntity: Habitat::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Habitat $habitat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(string $race): static
    {
        $this->race = $race;

        return $this;
    }

    public function getImagePrinc(): ?string
    {
        return $this->image_princ;
    }

    public function setImagePrinc(string $image_princ): static
    {
        $this->image_princ = $image_princ;

        return $this;
    }

    /**
     * Get the value of habitat
     */
    public function getHabitat()
    {
        return $this->habitat;
    }

    /**
     * Set the value of habitat
     *
     * @return  self
     */
    public function setHabitat($habitat)
    {
        $this->habitat = $habitat;

        return $this;
    }
}
