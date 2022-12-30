<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221230170417 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE safer ADD type_id INT NOT NULL, ADD categorie_id INT NOT NULL, ADD illustration VARCHAR(255) NOT NULL, DROP Type, DROP Categorie, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE Reference reference VARCHAR(255) NOT NULL, CHANGE Intitule intitule VARCHAR(255) NOT NULL, CHANGE Descriptif descriptif LONGTEXT NOT NULL, CHANGE Localisation localisation VARCHAR(255) NOT NULL, CHANGE Surface surface VARCHAR(255) NOT NULL, CHANGE Prix prix VARCHAR(255) NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE safer ADD CONSTRAINT FK_1111C504C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE safer ADD CONSTRAINT FK_1111C504BCF5E72D FOREIGN KEY (categorie_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_1111C504C54C8C93 ON safer (type_id)');
        $this->addSql('CREATE INDEX IDX_1111C504BCF5E72D ON safer (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE safer MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE safer DROP FOREIGN KEY FK_1111C504C54C8C93');
        $this->addSql('ALTER TABLE safer DROP FOREIGN KEY FK_1111C504BCF5E72D');
        $this->addSql('DROP INDEX IDX_1111C504C54C8C93 ON safer');
        $this->addSql('DROP INDEX IDX_1111C504BCF5E72D ON safer');
        $this->addSql('DROP INDEX `primary` ON safer');
        $this->addSql('ALTER TABLE safer ADD Type VARCHAR(20) NOT NULL, ADD Categorie VARCHAR(20) NOT NULL, DROP type_id, DROP categorie_id, DROP illustration, CHANGE id id INT NOT NULL, CHANGE reference Reference VARCHAR(15) NOT NULL, CHANGE intitule Intitule VARCHAR(200) NOT NULL, CHANGE descriptif Descriptif VARCHAR(200) NOT NULL, CHANGE localisation Localisation VARCHAR(10) NOT NULL, CHANGE surface Surface VARCHAR(10) NOT NULL, CHANGE prix Prix VARCHAR(15) NOT NULL');
    }
}
