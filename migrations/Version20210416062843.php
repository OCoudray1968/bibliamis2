<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210416062843 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Movies (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, id_gender_id INT NOT NULL, title VARCHAR(255) NOT NULL, director VARCHAR(255) NOT NULL, comments LONGTEXT DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX IDX_C1B2E806A76ED395 (user_id), INDEX IDX_C1B2E806873D1CC7 (id_gender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE books (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, id_gender_id INT NOT NULL, title VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, comments LONGTEXT DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX IDX_4A1B2A92A76ED395 (user_id), INDEX IDX_4A1B2A92873D1CC7 (id_gender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discs (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, id_gender_id INT NOT NULL, title VARCHAR(255) NOT NULL, artist VARCHAR(255) NOT NULL, support VARCHAR(255) DEFAULT NULL, comments LONGTEXT DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX IDX_3DD550F2A76ED395 (user_id), INDEX IDX_3DD550F2873D1CC7 (id_gender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE games (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, id_gender_id INT NOT NULL, title VARCHAR(255) NOT NULL, support VARCHAR(255) NOT NULL, comments LONGTEXT DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX IDX_FF232B31A76ED395 (user_id), INDEX IDX_FF232B31873D1CC7 (id_gender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Movies ADD CONSTRAINT FK_C1B2E806A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE Movies ADD CONSTRAINT FK_C1B2E806873D1CC7 FOREIGN KEY (id_gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A92A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A92873D1CC7 FOREIGN KEY (id_gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE discs ADD CONSTRAINT FK_3DD550F2A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE discs ADD CONSTRAINT FK_3DD550F2873D1CC7 FOREIGN KEY (id_gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE games ADD CONSTRAINT FK_FF232B31A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE games ADD CONSTRAINT FK_FF232B31873D1CC7 FOREIGN KEY (id_gender_id) REFERENCES gender (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE Movies');
        $this->addSql('DROP TABLE books');
        $this->addSql('DROP TABLE discs');
        $this->addSql('DROP TABLE games');
    }
}
