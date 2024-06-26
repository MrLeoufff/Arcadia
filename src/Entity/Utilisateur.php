<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[ORM\Table(name: 'utilisateur')]
#[UniqueEntity(fields: ['email'], message: "Il existe déjà un compte avec cette email")]
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $nom = null;

    #[ORM\Column(type: "string", length: 50, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(type: "string", length: 150)]
    private ?string $email = null;

    #[ORM\Column(type: "json")]
    private array $roles = [];

    #[ORM\Column(type: "string", length: 50)]
    private ?string $password = null;

    #[ORM\ManyToOne(targetEntity: Zoo::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Zoo $zoo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __construct(string $email, string $password, array $roles, string $nom, Zoo $zoo)
    {
        $this->email = $email;
        $this->password = $password;
        $this->roles = $roles;
        $this->nom = $nom;
        $this->zoo = $zoo;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // Si vous stockez des données sensibles temporaires sur l'utilisateur, effacez-les ici
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        // garantir que chaque utilisateur a au moins le rôle ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    public function getZoo(): ?Zoo
    {
        return $this->zoo;
    }

    public function setZoo(Zoo $zoo): static
    {
        $this->zoo = $zoo;

        return $this;
    }
}
