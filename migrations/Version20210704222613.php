<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210704222613 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE investor ADD loan_amount DOUBLE PRECISION NOT NULL, ADD loan_start_date DATE NOT NULL, CHANGE name investor_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE loan CHANGE end_date end_date VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE tranches CHANGE type tranche_type VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE investor DROP loan_amount, DROP loan_start_date, CHANGE investor_name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE loan CHANGE end_date end_date DATE NOT NULL');
        $this->addSql('ALTER TABLE tranches CHANGE tranche_type type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
