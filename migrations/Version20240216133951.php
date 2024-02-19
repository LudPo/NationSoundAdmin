<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240216133951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist ADD slug VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1599687E29DF899 ON artist (artist_name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1599687989D9B62 ON artist (slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_1599687E29DF899 ON artist');
        $this->addSql('DROP INDEX UNIQ_1599687989D9B62 ON artist');
        $this->addSql('ALTER TABLE artist DROP slug');
    }
}
