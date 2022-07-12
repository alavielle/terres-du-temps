<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220222093305 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actu (id INT AUTO_INCREMENT NOT NULL, period_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, periode VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, photo VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, is_in_home_page TINYINT(1) NOT NULL, INDEX IDX_83730342EC8B7ADE (period_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actu ADD CONSTRAINT FK_83730342EC8B7ADE FOREIGN KEY (period_id) REFERENCES periode (id)');
        $this->addSql('DROP TABLE news');
        $this->addSql('ALTER TABLE agenda ADD period_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE agenda ADD CONSTRAINT FK_2CEDC877EC8B7ADE FOREIGN KEY (period_id) REFERENCES periode (id)');
        $this->addSql('CREATE INDEX IDX_2CEDC877EC8B7ADE ON agenda (period_id)');
        $this->addSql('ALTER TABLE annuaire ADD period_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annuaire ADD CONSTRAINT FK_456BA70BEC8B7ADE FOREIGN KEY (period_id) REFERENCES periode (id)');
        $this->addSql('CREATE INDEX IDX_456BA70BEC8B7ADE ON annuaire (period_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, periode VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, photo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, active TINYINT(1) NOT NULL, is_in_home_page TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE actu');
        $this->addSql('ALTER TABLE agenda DROP FOREIGN KEY FK_2CEDC877EC8B7ADE');
        $this->addSql('DROP INDEX IDX_2CEDC877EC8B7ADE ON agenda');
        $this->addSql('ALTER TABLE agenda DROP period_id');
        $this->addSql('ALTER TABLE annuaire DROP FOREIGN KEY FK_456BA70BEC8B7ADE');
        $this->addSql('DROP INDEX IDX_456BA70BEC8B7ADE ON annuaire');
        $this->addSql('ALTER TABLE annuaire DROP period_id');
    }
}
