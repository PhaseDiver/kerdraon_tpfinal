<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190613022910 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE attaque (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, damage INT DEFAULT NULL, type SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE base (id INT AUTO_INCREMENT NOT NULL, createdat DATETIME NOT NULL, deletedat DATETIME DEFAULT NULL, updateat DATETIME NOT NULL, isenable TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokemon (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, hp INT NOT NULL, type SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokemon_attaque (pokemon_id INT NOT NULL, attaque_id INT NOT NULL, INDEX IDX_F91F67032FE71C3E (pokemon_id), INDEX IDX_F91F6703118FE712 (attaque_id), PRIMARY KEY(pokemon_id, attaque_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE potion (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, maxcapacity INT NOT NULL, hpregen INT NOT NULL, is_empty TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pokemon_attaque ADD CONSTRAINT FK_F91F67032FE71C3E FOREIGN KEY (pokemon_id) REFERENCES pokemon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pokemon_attaque ADD CONSTRAINT FK_F91F6703118FE712 FOREIGN KEY (attaque_id) REFERENCES attaque (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pokemon_attaque DROP FOREIGN KEY FK_F91F6703118FE712');
        $this->addSql('ALTER TABLE pokemon_attaque DROP FOREIGN KEY FK_F91F67032FE71C3E');
        $this->addSql('DROP TABLE attaque');
        $this->addSql('DROP TABLE base');
        $this->addSql('DROP TABLE pokemon');
        $this->addSql('DROP TABLE pokemon_attaque');
        $this->addSql('DROP TABLE potion');
        $this->addSql('DROP TABLE type');
    }
}
