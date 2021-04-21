<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210421081210 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movies DROP FOREIGN KEY FK_C1B2E806873D1CC7');
        $this->addSql('DROP INDEX IDX_C1B2E806873D1CC7 ON movies');
        $this->addSql('ALTER TABLE movies ADD genders_id INT DEFAULT NULL, DROP id_gender_id');
        $this->addSql('ALTER TABLE movies ADD CONSTRAINT FK_C1B2E806477C57FD FOREIGN KEY (genders_id) REFERENCES gender (id)');
        $this->addSql('CREATE INDEX IDX_C1B2E806477C57FD ON movies (genders_id)');
        $this->addSql('ALTER TABLE games DROP FOREIGN KEY FK_FF232B31873D1CC7');
        $this->addSql('DROP INDEX IDX_FF232B31873D1CC7 ON games');
        $this->addSql('ALTER TABLE games ADD genders_id INT DEFAULT NULL, DROP id_gender_id');
        $this->addSql('ALTER TABLE games ADD CONSTRAINT FK_FF232B31477C57FD FOREIGN KEY (genders_id) REFERENCES gender (id)');
        $this->addSql('CREATE INDEX IDX_FF232B31477C57FD ON games (genders_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE games DROP FOREIGN KEY FK_FF232B31477C57FD');
        $this->addSql('DROP INDEX IDX_FF232B31477C57FD ON games');
        $this->addSql('ALTER TABLE games ADD id_gender_id INT NOT NULL, DROP genders_id');
        $this->addSql('ALTER TABLE games ADD CONSTRAINT FK_FF232B31873D1CC7 FOREIGN KEY (id_gender_id) REFERENCES gender (id)');
        $this->addSql('CREATE INDEX IDX_FF232B31873D1CC7 ON games (id_gender_id)');
        $this->addSql('ALTER TABLE Movies DROP FOREIGN KEY FK_C1B2E806477C57FD');
        $this->addSql('DROP INDEX IDX_C1B2E806477C57FD ON Movies');
        $this->addSql('ALTER TABLE Movies ADD id_gender_id INT NOT NULL, DROP genders_id');
        $this->addSql('ALTER TABLE Movies ADD CONSTRAINT FK_C1B2E806873D1CC7 FOREIGN KEY (id_gender_id) REFERENCES gender (id)');
        $this->addSql('CREATE INDEX IDX_C1B2E806873D1CC7 ON Movies (id_gender_id)');
    }
}
