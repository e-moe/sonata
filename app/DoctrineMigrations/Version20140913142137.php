<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140913142137 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D2B5BD415E237E06 ON JamType (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E5E9995FBB827337 ON JamYear (year)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('DROP INDEX UNIQ_D2B5BD415E237E06 ON JamType');
        $this->addSql('DROP INDEX UNIQ_E5E9995FBB827337 ON JamYear');
    }
}
