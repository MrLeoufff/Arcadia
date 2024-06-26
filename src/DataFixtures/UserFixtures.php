<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
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
        $userData = [
            ['username' => 'admin', 'email' => 'jose.hammond@gmail.com', 'password' => 'azerty', 'role' => ['ROLE_ADMIN'], 'nom' => 'hammond'],
            ['username' => 'veto', 'email' => 'veterinaire.grant@gmail.com', 'password' => 'azerty', 'role' => ['ROLE_VETO'], 'nom' => 'grant'],
            ['username' => 'employe', 'email' => 'employe@gmail.com', 'password' => 'azerty', 'role' => ['ROLE_EMPLOYE'], 'nom' => 'nedry'],
        ];

        foreach ($userData as $UD) {
            $user = new Utilisateur(
                $UD['username'],
                $UD['email'],
                $UD['password'],
                $UD['role'],
                $UD['nom'],
                1,
            );
            $user->setPassword($this->passwordHasher->hashPassword($user, $UD['password']));
            $manager->persist($user);
        }
        $manager->flush();
    }
}
