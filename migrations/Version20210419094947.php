<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210419094947 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gender_book (gender_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_2A20E2AB708A0E0 (gender_id), INDEX IDX_2A20E2AB16A2B381 (book_id), PRIMARY KEY(gender_id, book_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gender_book ADD CONSTRAINT FK_2A20E2AB708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gender_book ADD CONSTRAINT FK_2A20E2AB16A2B381 FOREIGN KEY (book_id) REFERENCES books (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE gender_book');
    }
}
