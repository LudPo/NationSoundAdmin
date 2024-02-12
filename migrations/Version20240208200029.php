<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240208200029 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, artist_id INT NOT NULL, musical_genre_id INT NOT NULL, UNIQUE INDEX UNIQ_3BAE0AA7B7970CF8 (artist_id), INDEX IDX_3BAE0AA7791137AB (musical_genre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7791137AB FOREIGN KEY (musical_genre_id) REFERENCES musical_genre (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7B7970CF8');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7791137AB');
        $this->addSql('DROP TABLE event');
    }
}
