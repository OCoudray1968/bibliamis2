<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210308072118 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add image_name field to Books table';
    }

    public function up(Schema $schema) : void
    { 
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movies CHANGE comments comments LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE books ADD image_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE games CHANGE comments comments LONGTEXT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE books DROP image_name');
        $this->addSql('ALTER TABLE games CHANGE comments comments LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE Movies CHANGE comments comments LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
