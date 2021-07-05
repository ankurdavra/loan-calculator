<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210705012335 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tranches DROP FOREIGN KEY FK_6DB4E9C36B62CD11');
        $this->addSql('DROP INDEX IDX_6DB4E9C36B62CD11 ON tranches');
        $this->addSql('ALTER TABLE tranches CHANGE investor_id_id investor_id INT NOT NULL');
        $this->addSql('ALTER TABLE tranches ADD CONSTRAINT FK_6DB4E9C39AE528DA FOREIGN KEY (investor_id) REFERENCES investor (id)');
        $this->addSql('CREATE INDEX IDX_6DB4E9C39AE528DA ON tranches (investor_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tranches DROP FOREIGN KEY FK_6DB4E9C39AE528DA');
        $this->addSql('DROP INDEX IDX_6DB4E9C39AE528DA ON tranches');
        $this->addSql('ALTER TABLE tranches CHANGE investor_id investor_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE tranches ADD CONSTRAINT FK_6DB4E9C36B62CD11 FOREIGN KEY (investor_id_id) REFERENCES investor (id)');
        $this->addSql('CREATE INDEX IDX_6DB4E9C36B62CD11 ON tranches (investor_id_id)');
    }
}
