<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240529104927 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE image_animal');
        $this->addSql('DROP TABLE image_habitat');
        $this->addSql('ALTER TABLE aliment MODIFY id_aliment INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON aliment');
        $this->addSql('ALTER TABLE aliment CHANGE id_aliment id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE aliment ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE animal MODIFY id_animal INT NOT NULL');
        $this->addSql('DROP INDEX id_habitat ON animal');
        $this->addSql('DROP INDEX `primary` ON animal');
        $this->addSql('ALTER TABLE animal DROP id_habitat, CHANGE race race VARCHAR(50) NOT NULL, CHANGE id_animal id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE animal ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE commentaire MODIFY id_commentaire INT NOT NULL');
        $this->addSql('DROP INDEX id_zoo ON commentaire');
        $this->addSql('DROP INDEX `primary` ON commentaire');
        $this->addSql('ALTER TABLE commentaire ADD est_valide TINYINT(1) DEFAULT NULL, DROP estValide, DROP id_zoo, CHANGE avis avis LONGTEXT NOT NULL, CHANGE id_commentaire id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE commentaire ADD PRIMARY KEY (id)');
        $this->addSql('DROP INDEX id_aliment ON compte_rendu');
        $this->addSql('DROP INDEX id_utilisateur ON compte_rendu');
        $this->addSql('ALTER TABLE compte_rendu ADD id INT AUTO_INCREMENT NOT NULL, DROP id_animal, DROP id_aliment, DROP id_utilisateur, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE habitat MODIFY id_habitat INT NOT NULL');
        $this->addSql('DROP INDEX id_zoo ON habitat');
        $this->addSql('DROP INDEX `primary` ON habitat');
        $this->addSql('ALTER TABLE habitat DROP id_zoo, CHANGE description description LONGTEXT NOT NULL, CHANGE id_habitat id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE habitat ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE horaire MODIFY id_horaire INT NOT NULL');
        $this->addSql('DROP INDEX id_zoo ON horaire');
        $this->addSql('DROP INDEX `primary` ON horaire');
        $this->addSql('ALTER TABLE horaire DROP id_zoo, CHANGE id_horaire id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE horaire ADD PRIMARY KEY (id)');
        $this->addSql('DROP INDEX id_aliment ON repas');
        $this->addSql('DROP INDEX id_utilisateur ON repas');
        $this->addSql('ALTER TABLE repas ADD id INT AUTO_INCREMENT NOT NULL, DROP id_animal, DROP id_aliment, DROP id_utilisateur, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE service MODIFY id_service INT NOT NULL');
        $this->addSql('DROP INDEX id_zoo ON service');
        $this->addSql('DROP INDEX `primary` ON service');
        $this->addSql('ALTER TABLE service DROP id_zoo, CHANGE nom nom VARCHAR(50) NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE id_service id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE service ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE utilisateur MODIFY id_utilisateur INT NOT NULL');
        $this->addSql('DROP INDEX id_zoo ON utilisateur');
        $this->addSql('DROP INDEX `primary` ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP id_zoo, CHANGE prenom prenom VARCHAR(50) NOT NULL, CHANGE password password LONGTEXT NOT NULL, CHANGE id_utilisateur id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE zoo MODIFY id_zoo INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON zoo');
        $this->addSql('ALTER TABLE zoo CHANGE id_zoo id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE zoo ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE image_animal (id_image_animal INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, id_animal INT NOT NULL, INDEX id_animal (id_animal), PRIMARY KEY(id_image_animal)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE image_habitat (id_image_habitat INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, id_habitat INT NOT NULL, INDEX id_habitat (id_habitat), PRIMARY KEY(id_image_habitat)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('ALTER TABLE aliment MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON aliment');
        $this->addSql('ALTER TABLE aliment CHANGE id id_aliment INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE aliment ADD PRIMARY KEY (id_aliment)');
        $this->addSql('ALTER TABLE repas MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON repas');
        $this->addSql('ALTER TABLE repas ADD id_animal INT NOT NULL, ADD id_aliment INT NOT NULL, ADD id_utilisateur INT NOT NULL, DROP id');
        $this->addSql('CREATE INDEX id_aliment ON repas (id_aliment)');
        $this->addSql('CREATE INDEX id_utilisateur ON repas (id_utilisateur)');
        $this->addSql('ALTER TABLE repas ADD PRIMARY KEY (id_animal, id_aliment, id_utilisateur)');
        $this->addSql('ALTER TABLE animal MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON animal');
        $this->addSql('ALTER TABLE animal ADD id_habitat INT NOT NULL, CHANGE race race VARCHAR(20) NOT NULL, CHANGE id id_animal INT AUTO_INCREMENT NOT NULL');
        $this->addSql('CREATE INDEX id_habitat ON animal (id_habitat)');
        $this->addSql('ALTER TABLE animal ADD PRIMARY KEY (id_animal)');
        $this->addSql('ALTER TABLE compte_rendu MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON compte_rendu');
        $this->addSql('ALTER TABLE compte_rendu ADD id_animal INT NOT NULL, ADD id_aliment INT NOT NULL, ADD id_utilisateur INT NOT NULL, DROP id');
        $this->addSql('CREATE INDEX id_aliment ON compte_rendu (id_aliment)');
        $this->addSql('CREATE INDEX id_utilisateur ON compte_rendu (id_utilisateur)');
        $this->addSql('ALTER TABLE compte_rendu ADD PRIMARY KEY (id_animal, id_aliment, id_utilisateur)');
        $this->addSql('ALTER TABLE horaire MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON horaire');
        $this->addSql('ALTER TABLE horaire ADD id_zoo INT NOT NULL, CHANGE id id_horaire INT AUTO_INCREMENT NOT NULL');
        $this->addSql('CREATE INDEX id_zoo ON horaire (id_zoo)');
        $this->addSql('ALTER TABLE horaire ADD PRIMARY KEY (id_horaire)');
        $this->addSql('ALTER TABLE zoo MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON zoo');
        $this->addSql('ALTER TABLE zoo CHANGE id id_zoo INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE zoo ADD PRIMARY KEY (id_zoo)');
        $this->addSql('ALTER TABLE commentaire MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON commentaire');
        $this->addSql('ALTER TABLE commentaire ADD estValide TINYINT(1) DEFAULT 0 NOT NULL, ADD id_zoo INT DEFAULT NULL, DROP est_valide, CHANGE avis avis TEXT NOT NULL, CHANGE id id_commentaire INT AUTO_INCREMENT NOT NULL');
        $this->addSql('CREATE INDEX id_zoo ON commentaire (id_zoo)');
        $this->addSql('ALTER TABLE commentaire ADD PRIMARY KEY (id_commentaire)');
        $this->addSql('ALTER TABLE utilisateur MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur ADD id_zoo INT NOT NULL, CHANGE prenom prenom VARCHAR(50) DEFAULT NULL, CHANGE password password VARCHAR(50) NOT NULL, CHANGE id id_utilisateur INT AUTO_INCREMENT NOT NULL');
        $this->addSql('CREATE INDEX id_zoo ON utilisateur (id_zoo)');
        $this->addSql('ALTER TABLE utilisateur ADD PRIMARY KEY (id_utilisateur)');
        $this->addSql('ALTER TABLE habitat MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON habitat');
        $this->addSql('ALTER TABLE habitat ADD id_zoo INT NOT NULL, CHANGE description description TEXT NOT NULL, CHANGE id id_habitat INT AUTO_INCREMENT NOT NULL');
        $this->addSql('CREATE INDEX id_zoo ON habitat (id_zoo)');
        $this->addSql('ALTER TABLE habitat ADD PRIMARY KEY (id_habitat)');
        $this->addSql('ALTER TABLE service MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON service');
        $this->addSql('ALTER TABLE service ADD id_zoo INT NOT NULL, CHANGE nom nom VARCHAR(20) NOT NULL, CHANGE description description TEXT NOT NULL, CHANGE id id_service INT AUTO_INCREMENT NOT NULL');
        $this->addSql('CREATE INDEX id_zoo ON service (id_zoo)');
        $this->addSql('ALTER TABLE service ADD PRIMARY KEY (id_service)');
    }
}
