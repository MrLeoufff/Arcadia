<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240626135004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aliment (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(20) NOT NULL, type VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE animal (id INT AUTO_INCREMENT NOT NULL, habitat_id INT NOT NULL, prenom VARCHAR(100) NOT NULL, race VARCHAR(50) NOT NULL, image_princ VARCHAR(100) NOT NULL, INDEX IDX_6AAB231FAFFE2D26 (habitat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, zoo_id INT DEFAULT NULL, pseudo VARCHAR(20) NOT NULL, avis LONGTEXT NOT NULL, est_valide TINYINT(1) DEFAULT NULL, INDEX IDX_67F068BCFA5C94EF (zoo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte_rendu (animal_id INT NOT NULL, aliment_id INT NOT NULL, utilisateur_id INT NOT NULL, grammage NUMERIC(15, 2) NOT NULL, date_time DATETIME NOT NULL, etat VARCHAR(50) NOT NULL, INDEX IDX_D39E69D28E962C16 (animal_id), INDEX IDX_D39E69D2415B9F11 (aliment_id), INDEX IDX_D39E69D2FB88E14F (utilisateur_id), PRIMARY KEY(animal_id, aliment_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE habitat (id INT AUTO_INCREMENT NOT NULL, zoo_id INT NOT NULL, nom VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, image_princ VARCHAR(100) NOT NULL, INDEX IDX_3B37B2E8FA5C94EF (zoo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horaire (id INT AUTO_INCREMENT NOT NULL, zoo_id INT NOT NULL, jour DATE NOT NULL, heure_ouverture TIME NOT NULL, heure_fermeture TIME NOT NULL, INDEX IDX_BBC83DB6FA5C94EF (zoo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repas (animal_id INT NOT NULL, aliment_id INT NOT NULL, utilisateur_id INT NOT NULL, quantite NUMERIC(15, 2) NOT NULL, date_time DATETIME NOT NULL, INDEX IDX_A8D351B38E962C16 (animal_id), INDEX IDX_A8D351B3415B9F11 (aliment_id), INDEX IDX_A8D351B3FB88E14F (utilisateur_id), PRIMARY KEY(animal_id, aliment_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, zoo_id INT NOT NULL, nom VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, image_service VARCHAR(100) NOT NULL, INDEX IDX_E19D9AD2FA5C94EF (zoo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, zoo_id INT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) DEFAULT NULL, email VARCHAR(150) NOT NULL, roles JSON NOT NULL, password VARCHAR(50) NOT NULL, INDEX IDX_1D1C63B3FA5C94EF (zoo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zoo (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FAFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCFA5C94EF FOREIGN KEY (zoo_id) REFERENCES zoo (id)');
        $this->addSql('ALTER TABLE compte_rendu ADD CONSTRAINT FK_D39E69D28E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE compte_rendu ADD CONSTRAINT FK_D39E69D2415B9F11 FOREIGN KEY (aliment_id) REFERENCES aliment (id)');
        $this->addSql('ALTER TABLE compte_rendu ADD CONSTRAINT FK_D39E69D2FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE habitat ADD CONSTRAINT FK_3B37B2E8FA5C94EF FOREIGN KEY (zoo_id) REFERENCES zoo (id)');
        $this->addSql('ALTER TABLE horaire ADD CONSTRAINT FK_BBC83DB6FA5C94EF FOREIGN KEY (zoo_id) REFERENCES zoo (id)');
        $this->addSql('ALTER TABLE repas ADD CONSTRAINT FK_A8D351B38E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE repas ADD CONSTRAINT FK_A8D351B3415B9F11 FOREIGN KEY (aliment_id) REFERENCES aliment (id)');
        $this->addSql('ALTER TABLE repas ADD CONSTRAINT FK_A8D351B3FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2FA5C94EF FOREIGN KEY (zoo_id) REFERENCES zoo (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3FA5C94EF FOREIGN KEY (zoo_id) REFERENCES zoo (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FAFFE2D26');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCFA5C94EF');
        $this->addSql('ALTER TABLE compte_rendu DROP FOREIGN KEY FK_D39E69D28E962C16');
        $this->addSql('ALTER TABLE compte_rendu DROP FOREIGN KEY FK_D39E69D2415B9F11');
        $this->addSql('ALTER TABLE compte_rendu DROP FOREIGN KEY FK_D39E69D2FB88E14F');
        $this->addSql('ALTER TABLE habitat DROP FOREIGN KEY FK_3B37B2E8FA5C94EF');
        $this->addSql('ALTER TABLE horaire DROP FOREIGN KEY FK_BBC83DB6FA5C94EF');
        $this->addSql('ALTER TABLE repas DROP FOREIGN KEY FK_A8D351B38E962C16');
        $this->addSql('ALTER TABLE repas DROP FOREIGN KEY FK_A8D351B3415B9F11');
        $this->addSql('ALTER TABLE repas DROP FOREIGN KEY FK_A8D351B3FB88E14F');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2FA5C94EF');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3FA5C94EF');
        $this->addSql('DROP TABLE aliment');
        $this->addSql('DROP TABLE animal');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE compte_rendu');
        $this->addSql('DROP TABLE habitat');
        $this->addSql('DROP TABLE horaire');
        $this->addSql('DROP TABLE repas');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE zoo');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
