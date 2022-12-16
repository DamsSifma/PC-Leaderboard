<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221216134533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE attempt (id INT AUTO_INCREMENT NOT NULL, attempted_by_id INT DEFAULT NULL, challenge_id INT DEFAULT NULL, attempted_on DATETIME NOT NULL, attempt VARCHAR(255) NOT NULL, INDEX IDX_18EC0266A3C0CBD4 (attempted_by_id), INDEX IDX_18EC026698A21AC6 (challenge_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE validation (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, challenge_id INT DEFAULT NULL, validated_on DATETIME DEFAULT NULL, feedback SMALLINT DEFAULT NULL, INDEX IDX_16AC5B6EB03A8386 (created_by_id), INDEX IDX_16AC5B6E98A21AC6 (challenge_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE attempt ADD CONSTRAINT FK_18EC0266A3C0CBD4 FOREIGN KEY (attempted_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE attempt ADD CONSTRAINT FK_18EC026698A21AC6 FOREIGN KEY (challenge_id) REFERENCES challenge (id)');
        $this->addSql('ALTER TABLE validation ADD CONSTRAINT FK_16AC5B6EB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE validation ADD CONSTRAINT FK_16AC5B6E98A21AC6 FOREIGN KEY (challenge_id) REFERENCES challenge (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attempt DROP FOREIGN KEY FK_18EC0266A3C0CBD4');
        $this->addSql('ALTER TABLE attempt DROP FOREIGN KEY FK_18EC026698A21AC6');
        $this->addSql('ALTER TABLE validation DROP FOREIGN KEY FK_16AC5B6EB03A8386');
        $this->addSql('ALTER TABLE validation DROP FOREIGN KEY FK_16AC5B6E98A21AC6');
        $this->addSql('DROP TABLE attempt');
        $this->addSql('DROP TABLE validation');
    }
}
