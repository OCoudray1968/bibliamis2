<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210421070130 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE discs DROP FOREIGN KEY FK_3DD550F2873D1CC7');
        $this->addSql('DROP INDEX IDX_3DD550F2873D1CC7 ON discs');
        $this->addSql('ALTER TABLE discs ADD genders_id INT DEFAULT NULL, DROP id_gender_id');
        $this->addSql('ALTER TABLE discs ADD CONSTRAINT FK_3DD550F2477C57FD FOREIGN KEY (genders_id) REFERENCES gender (id)');
        $this->addSql('CREATE INDEX IDX_3DD550F2477C57FD ON discs (genders_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE discs DROP FOREIGN KEY FK_3DD550F2477C57FD');
        $this->addSql('DROP INDEX IDX_3DD550F2477C57FD ON discs');
        $this->addSql('ALTER TABLE discs ADD id_gender_id INT NOT NULL, DROP genders_id');
        $this->addSql('ALTER TABLE discs ADD CONSTRAINT FK_3DD550F2873D1CC7 FOREIGN KEY (id_gender_id) REFERENCES gender (id)');
        $this->addSql('CREATE INDEX IDX_3DD550F2873D1CC7 ON discs (id_gender_id)');
    }
}
