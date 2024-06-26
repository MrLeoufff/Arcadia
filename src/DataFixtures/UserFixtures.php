<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use App\Entity\Zoo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Création d'un objet Zoo pour les utilisateurs
        $zoo = new Zoo();
        $zoo->setNom('Zoo Arcadia');
        $manager->persist($zoo);
        $manager->flush();

        $userData = [
            ['email' => 'jose.hammond@gmail.com', 'password' => 'azerty', 'role' => ['ROLE_ADMIN'], 'nom' => 'hammond'],
            ['email' => 'veterinaire.grant@gmail.com', 'password' => 'azerty', 'role' => ['ROLE_VETO'], 'nom' => 'grant'],
            ['email' => 'employe@gmail.com', 'password' => 'azerty', 'role' => ['ROLE_EMPLOYE'], 'nom' => 'nedry'],
        ];

        foreach ($userData as $UD) {
            $user = new Utilisateur(
                $UD['email'],
                $UD['password'],
                $UD['role'],
                $UD['nom'],
                $zoo
            );
            $user->setPassword($this->passwordHasher->hashPassword($user, $UD['password']));
            $manager->persist($user);
        }
        $manager->flush();
    }
}
