<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210625122733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F814BBC2705');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F814BBC2705 FOREIGN KEY (version_id) REFERENCES version (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F814BBC2705');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F814BBC2705 FOREIGN KEY (version_id) REFERENCES version (id)');
    }
}
