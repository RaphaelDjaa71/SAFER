<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230102023608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien CHANGE illustration illustration VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE bien RENAME INDEX idx_1111c504c54c8c93 TO IDX_45EDC386C54C8C93');
        $this->addSql('ALTER TABLE bien RENAME INDEX idx_1111c504bcf5e72d TO IDX_45EDC386BCF5E72D');
        $this->addSql('ALTER TABLE utilisateur RENAME INDEX uniq_8d93d649e7927c74 TO UNIQ_1D1C63B3E7927C74');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien CHANGE illustration illustration BLOB DEFAULT NULL');
        $this->addSql('ALTER TABLE bien RENAME INDEX idx_45edc386bcf5e72d TO IDX_1111C504BCF5E72D');
        $this->addSql('ALTER TABLE bien RENAME INDEX idx_45edc386c54c8c93 TO IDX_1111C504C54C8C93');
        $this->addSql('ALTER TABLE `utilisateur` RENAME INDEX uniq_1d1c63b3e7927c74 TO UNIQ_8D93D649E7927C74');
    }
}
