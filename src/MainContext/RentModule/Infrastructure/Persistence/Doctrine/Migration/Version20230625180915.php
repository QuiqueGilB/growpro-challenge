<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Infrastructure\Persistence\Doctrine\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230625180915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE maincontext_rentmodule_bike (id VARCHAR(36) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, type VARCHAR(8) NOT NULL, plan VARCHAR(7) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B156DB4F8B8E8428 ON maincontext_rentmodule_bike (created_at)');
        $this->addSql('CREATE TABLE maincontext_rentmodule_rent (id VARCHAR(36) NOT NULL, bike_id VARCHAR(36) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, rent_time VARCHAR(255) NOT NULL, priceamount NUMERIC(10, 0) NOT NULL, pricecurrency VARCHAR(3) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FF92A103D5A4816F ON maincontext_rentmodule_rent (bike_id)');
        $this->addSql('CREATE INDEX IDX_FF92A1038B8E8428 ON maincontext_rentmodule_rent (created_at)');
        $this->addSql('ALTER TABLE maincontext_rentmodule_rent ADD CONSTRAINT FK_FF92A103D5A4816F FOREIGN KEY (bike_id) REFERENCES maincontext_rentmodule_bike (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE maincontext_rentmodule_rent DROP CONSTRAINT FK_FF92A103D5A4816F');
        $this->addSql('DROP TABLE maincontext_rentmodule_bike');
        $this->addSql('DROP TABLE maincontext_rentmodule_rent');
    }
}
