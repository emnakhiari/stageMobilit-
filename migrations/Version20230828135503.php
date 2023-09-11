<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230828135503 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demande ADD cv VARCHAR(65535) NOT NULL');
        $this->addSql('ALTER TABLE ecole_partenaire CHANGE nom nom VARCHAR(65535) NOT NULL, CHANGE email email VARCHAR(65535) NOT NULL, CHANGE image image VARCHAR(65535) NOT NULL, CHANGE description description VARCHAR(65535) NOT NULL');
        $this->addSql('ALTER TABLE message CHANGE message message VARCHAR(65535) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE image image VARCHAR(65535) NOT NULL, CHANGE reset_token reset_token VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE image image VARCHAR(65535) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demande DROP cv');
        $this->addSql('ALTER TABLE ecole_partenaire CHANGE nom nom MEDIUMTEXT NOT NULL, CHANGE email email MEDIUMTEXT NOT NULL, CHANGE image image MEDIUMTEXT NOT NULL, CHANGE description description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE message CHANGE message message MEDIUMTEXT NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE image image MEDIUMTEXT NOT NULL, CHANGE reset_token reset_token VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE image image MEDIUMTEXT NOT NULL');
    }
}
