<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240207183124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, location_name VARCHAR(255) NOT NULL, latitude NUMERIC(10, 7) NOT NULL, longitude NUMERIC(11, 7) NOT NULL, location_icon VARCHAR(255) NOT NULL, location_category_id INT NOT NULL, INDEX IDX_5E9E89CB4937AA6 (location_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE location_category (id INT AUTO_INCREMENT NOT NULL, location_category VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE musical_genre (id INT AUTO_INCREMENT NOT NULL, musical_genre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB4937AA6 FOREIGN KEY (location_category_id) REFERENCES location_category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CB4937AA6');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE location_category');
        $this->addSql('DROP TABLE musical_genre');
        $this->addSql('DROP TABLE user');
    }
}
