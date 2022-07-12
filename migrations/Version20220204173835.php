<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220204173835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agenda ADD is_in_home_page TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE annuaire ADD is_in_home_page TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE news ADD is_in_home_page TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agenda DROP is_in_home_page');
        $this->addSql('ALTER TABLE annuaire DROP is_in_home_page');
        $this->addSql('ALTER TABLE news DROP is_in_home_page');
    }
}
