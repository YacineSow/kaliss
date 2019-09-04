<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190903093954 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE expediteur ADD nomexpediteur VARCHAR(255) NOT NULL, ADD prenomexpediteur VARCHAR(255) NOT NULL, DROP nom, DROP prenom, CHANGE telephone telephoneexpediteur BIGINT NOT NULL');
        $this->addSql('ALTER TABLE beneficiaire ADD nombeneficiaire VARCHAR(255) NOT NULL, ADD prenombeneficiaire VARCHAR(255) NOT NULL, DROP nom, DROP prenom, CHANGE telephone telephonebeneficiaire BIGINT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE beneficiaire ADD nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD prenom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP nombeneficiaire, DROP prenombeneficiaire, CHANGE telephonebeneficiaire telephone BIGINT NOT NULL');
        $this->addSql('ALTER TABLE expediteur ADD nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD prenom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP nomexpediteur, DROP prenomexpediteur, CHANGE telephoneexpediteur telephone BIGINT NOT NULL');
    }
}
