<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "compte_rendu")]
class CompteRendu
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Animal::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animal $animal = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Aliment::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Aliment $aliment = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\Column(type: "decimal", precision: 15, scale: 2)]
    private ?float $grammage = null;

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $dateTime = null;

    #[ORM\Column(type : "string", length: 50)]
    private ?string $etat = null;

    // Getters and Setters...

    /**
     * Get the value of animal
     */
    public function getAnimal()
    {
        return $this->animal;
    }

    /**
     * Set the value of animal
     *
     * @return  self
     */
    public function setAnimal($animal)
    {
        $this->animal = $animal;

        return $this;
    }

    /**
     * Get the value of aliment
     */
    public function getAliment()
    {
        return $this->aliment;
    }

    /**
     * Set the value of aliment
     *
     * @return  self
     */
    public function setAliment($aliment)
    {
        $this->aliment = $aliment;

        return $this;
    }

    /**
     * Get the value of utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set the value of utilisateur
     *
     * @return  self
     */
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get the value of grammage
     */
    public function getGrammage()
    {
        return $this->grammage;
    }

    /**
     * Set the value of grammage
     *
     * @return  self
     */
    public function setGrammage($grammage)
    {
        $this->grammage = $grammage;

        return $this;
    }

    /**
     * Get the value of dateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set the value of dateTime
     *
     * @return  self
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get the value of etat
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     *
     * @return  self
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }
}
