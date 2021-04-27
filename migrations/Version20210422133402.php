<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422133402 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE loanning (id INT AUTO_INCREMENT NOT NULL, lender_id INT NOT NULL, borrower_id INT NOT NULL, loan_date DATE NOT NULL, back_date DATE NOT NULL, ongoing TINYINT(1) NOT NULL, INDEX IDX_CE65810F855D3E3D (lender_id), INDEX IDX_CE65810F11CE312B (borrower_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loanning_book (loanning_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_5A1066AE725DBE1E (loanning_id), INDEX IDX_5A1066AE16A2B381 (book_id), PRIMARY KEY(loanning_id, book_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loanning_disc (loanning_id INT NOT NULL, disc_id INT NOT NULL, INDEX IDX_935A90AF725DBE1E (loanning_id), INDEX IDX_935A90AFC38F37CA (disc_id), PRIMARY KEY(loanning_id, disc_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loanning_movie (loanning_id INT NOT NULL, movie_id INT NOT NULL, INDEX IDX_7D7F897F725DBE1E (loanning_id), INDEX IDX_7D7F897F8F93B6FC (movie_id), PRIMARY KEY(loanning_id, movie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loanning_game (loanning_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_B2DEF413725DBE1E (loanning_id), INDEX IDX_B2DEF413E48FD905 (game_id), PRIMARY KEY(loanning_id, game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE loanning ADD CONSTRAINT FK_CE65810F855D3E3D FOREIGN KEY (lender_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE loanning ADD CONSTRAINT FK_CE65810F11CE312B FOREIGN KEY (borrower_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE loanning_book ADD CONSTRAINT FK_5A1066AE725DBE1E FOREIGN KEY (loanning_id) REFERENCES loanning (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loanning_book ADD CONSTRAINT FK_5A1066AE16A2B381 FOREIGN KEY (book_id) REFERENCES books (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loanning_disc ADD CONSTRAINT FK_935A90AF725DBE1E FOREIGN KEY (loanning_id) REFERENCES loanning (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loanning_disc ADD CONSTRAINT FK_935A90AFC38F37CA FOREIGN KEY (disc_id) REFERENCES discs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loanning_movie ADD CONSTRAINT FK_7D7F897F725DBE1E FOREIGN KEY (loanning_id) REFERENCES loanning (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loanning_movie ADD CONSTRAINT FK_7D7F897F8F93B6FC FOREIGN KEY (movie_id) REFERENCES Movies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loanning_game ADD CONSTRAINT FK_B2DEF413725DBE1E FOREIGN KEY (loanning_id) REFERENCES loanning (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loanning_game ADD CONSTRAINT FK_B2DEF413E48FD905 FOREIGN KEY (game_id) REFERENCES games (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE loanning_book DROP FOREIGN KEY FK_5A1066AE725DBE1E');
        $this->addSql('ALTER TABLE loanning_disc DROP FOREIGN KEY FK_935A90AF725DBE1E');
        $this->addSql('ALTER TABLE loanning_movie DROP FOREIGN KEY FK_7D7F897F725DBE1E');
        $this->addSql('ALTER TABLE loanning_game DROP FOREIGN KEY FK_B2DEF413725DBE1E');
        $this->addSql('DROP TABLE loanning');
        $this->addSql('DROP TABLE loanning_book');
        $this->addSql('DROP TABLE loanning_disc');
        $this->addSql('DROP TABLE loanning_movie');
        $this->addSql('DROP TABLE loanning_game');
    }
}
