<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140913135510 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('CREATE TABLE Jam (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, year_id INT NOT NULL, comment LONGTEXT NOT NULL, INDEX IDX_CDA99607C54C8C93 (type_id), INDEX IDX_CDA9960740C1FEA7 (year_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE JamType (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE JamYear (id INT AUTO_INCREMENT NOT NULL, year INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Jam ADD CONSTRAINT FK_CDA99607C54C8C93 FOREIGN KEY (type_id) REFERENCES JamType (id)');
        $this->addSql('ALTER TABLE Jam ADD CONSTRAINT FK_CDA9960740C1FEA7 FOREIGN KEY (year_id) REFERENCES JamYear (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE Jam DROP FOREIGN KEY FK_CDA99607C54C8C93');
        $this->addSql('ALTER TABLE Jam DROP FOREIGN KEY FK_CDA9960740C1FEA7');
        $this->addSql('DROP TABLE Jam');
        $this->addSql('DROP TABLE JamType');
        $this->addSql('DROP TABLE JamYear');
    }
}
