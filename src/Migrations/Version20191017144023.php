<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20191017144023 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Initial player table';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('CREATE TABLE player (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP TABLE player');
    }
}
