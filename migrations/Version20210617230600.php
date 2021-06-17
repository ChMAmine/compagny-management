<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210617230600 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, society_id INT DEFAULT NULL, version_id INT DEFAULT NULL, number INT NOT NULL, channel_type VARCHAR(150) NOT NULL, name VARCHAR(255) NOT NULL, city VARCHAR(150) NOT NULL, postal_code INT NOT NULL, INDEX IDX_D4E6F81E6389D24 (society_id), INDEX IDX_D4E6F814BBC2705 (version_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE legal_form (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE society (id INT AUTO_INCREMENT NOT NULL, legal_form_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, siren_number INT NOT NULL, city_of_registration VARCHAR(150) NOT NULL, registration DATE NOT NULL, capital DOUBLE PRECISION NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_D6461F298CD0513 (legal_form_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE version (id INT AUTO_INCREMENT NOT NULL, legal_form_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, siren_number INT NOT NULL, city_of_registration VARCHAR(150) NOT NULL, registration DATE NOT NULL, capital DOUBLE PRECISION NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_BF1CD3C398CD0513 (legal_form_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81E6389D24 FOREIGN KEY (society_id) REFERENCES society (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F814BBC2705 FOREIGN KEY (version_id) REFERENCES version (id)');
        $this->addSql('ALTER TABLE society ADD CONSTRAINT FK_D6461F298CD0513 FOREIGN KEY (legal_form_id) REFERENCES legal_form (id)');
        $this->addSql('ALTER TABLE version ADD CONSTRAINT FK_BF1CD3C398CD0513 FOREIGN KEY (legal_form_id) REFERENCES legal_form (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE society DROP FOREIGN KEY FK_D6461F298CD0513');
        $this->addSql('ALTER TABLE version DROP FOREIGN KEY FK_BF1CD3C398CD0513');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81E6389D24');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F814BBC2705');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE legal_form');
        $this->addSql('DROP TABLE society');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE version');
    }
}
