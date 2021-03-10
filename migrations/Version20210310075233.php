<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210310075233 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add image-name fied onto movies, discs and games table';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movies ADD image_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE discs ADD image_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE games ADD image_name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE discs DROP image_name');
        $this->addSql('ALTER TABLE games DROP image_name');
        $this->addSql('ALTER TABLE Movies DROP image_name');
    }
}
