<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210617103202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, society_id INT DEFAULT NULL, archive_id INT DEFAULT NULL, number INT NOT NULL, channel_type VARCHAR(150) NOT NULL, name VARCHAR(255) NOT NULL, city VARCHAR(150) NOT NULL, postal_code INT NOT NULL, INDEX IDX_D4E6F81E6389D24 (society_id), INDEX IDX_D4E6F812956195F (archive_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE archive (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, siren_number INT NOT NULL, city_of_registration VARCHAR(150) NOT NULL, registration DATE NOT NULL, capital DOUBLE PRECISION NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE legal_form (id INT AUTO_INCREMENT NOT NULL, society_id INT DEFAULT NULL, relation_id INT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_7FF313F8E6389D24 (society_id), UNIQUE INDEX UNIQ_7FF313F83256915B (relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE society (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, siren_number INT NOT NULL, city_of_registration VARCHAR(150) NOT NULL, registration DATE NOT NULL, capital DOUBLE PRECISION NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81E6389D24 FOREIGN KEY (society_id) REFERENCES society (id)');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F812956195F FOREIGN KEY (archive_id) REFERENCES archive (id)');
        $this->addSql('ALTER TABLE legal_form ADD CONSTRAINT FK_7FF313F8E6389D24 FOREIGN KEY (society_id) REFERENCES society (id)');
        $this->addSql('ALTER TABLE legal_form ADD CONSTRAINT FK_7FF313F83256915B FOREIGN KEY (relation_id) REFERENCES archive (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F812956195F');
        $this->addSql('ALTER TABLE legal_form DROP FOREIGN KEY FK_7FF313F83256915B');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81E6389D24');
        $this->addSql('ALTER TABLE legal_form DROP FOREIGN KEY FK_7FF313F8E6389D24');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE archive');
        $this->addSql('DROP TABLE legal_form');
        $this->addSql('DROP TABLE society');
    }
}
