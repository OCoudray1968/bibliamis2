<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210312074108 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add relations between users and Books,Movies,Discs and Games tables';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movies ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE movies ADD CONSTRAINT FK_C1B2E806A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_C1B2E806A76ED395 ON movies (user_id)');
        $this->addSql('ALTER TABLE books ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A92A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_4A1B2A92A76ED395 ON books (user_id)');
        $this->addSql('ALTER TABLE discs ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE discs ADD CONSTRAINT FK_3DD550F2A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_3DD550F2A76ED395 ON discs (user_id)');
        $this->addSql('ALTER TABLE games ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE games ADD CONSTRAINT FK_FF232B31A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_FF232B31A76ED395 ON games (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A92A76ED395');
        $this->addSql('DROP INDEX IDX_4A1B2A92A76ED395 ON books');
        $this->addSql('ALTER TABLE books DROP user_id');
        $this->addSql('ALTER TABLE discs DROP FOREIGN KEY FK_3DD550F2A76ED395');
        $this->addSql('DROP INDEX IDX_3DD550F2A76ED395 ON discs');
        $this->addSql('ALTER TABLE discs DROP user_id');
        $this->addSql('ALTER TABLE games DROP FOREIGN KEY FK_FF232B31A76ED395');
        $this->addSql('DROP INDEX IDX_FF232B31A76ED395 ON games');
        $this->addSql('ALTER TABLE games DROP user_id');
        $this->addSql('ALTER TABLE Movies DROP FOREIGN KEY FK_C1B2E806A76ED395');
        $this->addSql('DROP INDEX IDX_C1B2E806A76ED395 ON Movies');
        $this->addSql('ALTER TABLE Movies DROP user_id');
    }
}
