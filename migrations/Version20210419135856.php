<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210419135856 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book_gender (book_id INT NOT NULL, gender_id INT NOT NULL, INDEX IDX_EE9001CF16A2B381 (book_id), INDEX IDX_EE9001CF708A0E0 (gender_id), PRIMARY KEY(book_id, gender_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gender_book (gender_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_2A20E2AB708A0E0 (gender_id), INDEX IDX_2A20E2AB16A2B381 (book_id), PRIMARY KEY(gender_id, book_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE book_gender ADD CONSTRAINT FK_EE9001CF16A2B381 FOREIGN KEY (book_id) REFERENCES books (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_gender ADD CONSTRAINT FK_EE9001CF708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gender_book ADD CONSTRAINT FK_2A20E2AB708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gender_book ADD CONSTRAINT FK_2A20E2AB16A2B381 FOREIGN KEY (book_id) REFERENCES books (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A92477C57FD');
        $this->addSql('DROP INDEX IDX_4A1B2A92477C57FD ON books');
        $this->addSql('ALTER TABLE books DROP genders_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE book_gender');
        $this->addSql('DROP TABLE gender_book');
        $this->addSql('ALTER TABLE books ADD genders_id INT NOT NULL');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A92477C57FD FOREIGN KEY (genders_id) REFERENCES gender (id)');
        $this->addSql('CREATE INDEX IDX_4A1B2A92477C57FD ON books (genders_id)');
    }
}
