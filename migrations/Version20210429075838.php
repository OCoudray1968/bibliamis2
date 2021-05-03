<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210429075838 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE loanning_book');
        $this->addSql('DROP TABLE loanning_disc');
        $this->addSql('DROP TABLE loanning_game');
        $this->addSql('DROP TABLE loanning_movie');
        $this->addSql('ALTER TABLE loanning ADD book_id INT DEFAULT NULL, ADD disc_id INT DEFAULT NULL, ADD movie_id INT DEFAULT NULL, ADD game_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE loanning ADD CONSTRAINT FK_CE65810F16A2B381 FOREIGN KEY (book_id) REFERENCES books (id)');
        $this->addSql('ALTER TABLE loanning ADD CONSTRAINT FK_CE65810FC38F37CA FOREIGN KEY (disc_id) REFERENCES discs (id)');
        $this->addSql('ALTER TABLE loanning ADD CONSTRAINT FK_CE65810F8F93B6FC FOREIGN KEY (movie_id) REFERENCES Movies (id)');
        $this->addSql('ALTER TABLE loanning ADD CONSTRAINT FK_CE65810FE48FD905 FOREIGN KEY (game_id) REFERENCES games (id)');
        $this->addSql('CREATE INDEX IDX_CE65810F16A2B381 ON loanning (book_id)');
        $this->addSql('CREATE INDEX IDX_CE65810FC38F37CA ON loanning (disc_id)');
        $this->addSql('CREATE INDEX IDX_CE65810F8F93B6FC ON loanning (movie_id)');
        $this->addSql('CREATE INDEX IDX_CE65810FE48FD905 ON loanning (game_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE loanning_book (loanning_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_5A1066AE16A2B381 (book_id), INDEX IDX_5A1066AE725DBE1E (loanning_id), PRIMARY KEY(loanning_id, book_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE loanning_disc (loanning_id INT NOT NULL, disc_id INT NOT NULL, INDEX IDX_935A90AFC38F37CA (disc_id), INDEX IDX_935A90AF725DBE1E (loanning_id), PRIMARY KEY(loanning_id, disc_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE loanning_game (loanning_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_B2DEF413E48FD905 (game_id), INDEX IDX_B2DEF413725DBE1E (loanning_id), PRIMARY KEY(loanning_id, game_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE loanning_movie (loanning_id INT NOT NULL, movie_id INT NOT NULL, INDEX IDX_7D7F897F8F93B6FC (movie_id), INDEX IDX_7D7F897F725DBE1E (loanning_id), PRIMARY KEY(loanning_id, movie_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE loanning_book ADD CONSTRAINT FK_5A1066AE16A2B381 FOREIGN KEY (book_id) REFERENCES books (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loanning_book ADD CONSTRAINT FK_5A1066AE725DBE1E FOREIGN KEY (loanning_id) REFERENCES loanning (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loanning_disc ADD CONSTRAINT FK_935A90AF725DBE1E FOREIGN KEY (loanning_id) REFERENCES loanning (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loanning_disc ADD CONSTRAINT FK_935A90AFC38F37CA FOREIGN KEY (disc_id) REFERENCES discs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loanning_game ADD CONSTRAINT FK_B2DEF413725DBE1E FOREIGN KEY (loanning_id) REFERENCES loanning (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loanning_game ADD CONSTRAINT FK_B2DEF413E48FD905 FOREIGN KEY (game_id) REFERENCES games (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loanning_movie ADD CONSTRAINT FK_7D7F897F725DBE1E FOREIGN KEY (loanning_id) REFERENCES loanning (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loanning_movie ADD CONSTRAINT FK_7D7F897F8F93B6FC FOREIGN KEY (movie_id) REFERENCES movies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loanning DROP FOREIGN KEY FK_CE65810F16A2B381');
        $this->addSql('ALTER TABLE loanning DROP FOREIGN KEY FK_CE65810FC38F37CA');
        $this->addSql('ALTER TABLE loanning DROP FOREIGN KEY FK_CE65810F8F93B6FC');
        $this->addSql('ALTER TABLE loanning DROP FOREIGN KEY FK_CE65810FE48FD905');
        $this->addSql('DROP INDEX IDX_CE65810F16A2B381 ON loanning');
        $this->addSql('DROP INDEX IDX_CE65810FC38F37CA ON loanning');
        $this->addSql('DROP INDEX IDX_CE65810F8F93B6FC ON loanning');
        $this->addSql('DROP INDEX IDX_CE65810FE48FD905 ON loanning');
        $this->addSql('ALTER TABLE loanning DROP book_id, DROP disc_id, DROP movie_id, DROP game_id');
    }
}
