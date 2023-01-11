<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230111165721 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipment_ext (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment_ext_gite (equipment_ext_id INT NOT NULL, gite_id INT NOT NULL, INDEX IDX_AFE16A21FA8AC0ED (equipment_ext_id), INDEX IDX_AFE16A21652CAE9B (gite_id), PRIMARY KEY(equipment_ext_id, gite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment_int (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gite (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zipcode VARCHAR(255) NOT NULL, departement VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, surface DOUBLE PRECISION NOT NULL, rooms INT NOT NULL, beds INT NOT NULL, animal_allowed TINYINT(1) NOT NULL, animal_cost DOUBLE PRECISION DEFAULT NULL, disponibilities LONGTEXT NOT NULL, description LONGTEXT DEFAULT NULL, green_price INT NOT NULL, red_price INT DEFAULT NULL, start_red DATE DEFAULT NULL, end_red DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gite_equipment_int (gite_id INT NOT NULL, equipment_int_id INT NOT NULL, INDEX IDX_5279F165652CAE9B (gite_id), INDEX IDX_5279F16562E862B4 (equipment_int_id), PRIMARY KEY(gite_id, equipment_int_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gite_service (id INT AUTO_INCREMENT NOT NULL, id_service_id INT DEFAULT NULL, id_gite_id INT DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, INDEX IDX_1527AE9A48D62931 (id_service_id), INDEX IDX_1527AE9ABBB107EB (id_gite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, photo_link VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo_gite (photo_id INT NOT NULL, gite_id INT NOT NULL, INDEX IDX_37097BD87E9E4C8C (photo_id), INDEX IDX_37097BD8652CAE9B (gite_id), PRIMARY KEY(photo_id, gite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipment_ext_gite ADD CONSTRAINT FK_AFE16A21FA8AC0ED FOREIGN KEY (equipment_ext_id) REFERENCES equipment_ext (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipment_ext_gite ADD CONSTRAINT FK_AFE16A21652CAE9B FOREIGN KEY (gite_id) REFERENCES gite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gite_equipment_int ADD CONSTRAINT FK_5279F165652CAE9B FOREIGN KEY (gite_id) REFERENCES gite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gite_equipment_int ADD CONSTRAINT FK_5279F16562E862B4 FOREIGN KEY (equipment_int_id) REFERENCES equipment_int (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gite_service ADD CONSTRAINT FK_1527AE9A48D62931 FOREIGN KEY (id_service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE gite_service ADD CONSTRAINT FK_1527AE9ABBB107EB FOREIGN KEY (id_gite_id) REFERENCES gite (id)');
        $this->addSql('ALTER TABLE photo_gite ADD CONSTRAINT FK_37097BD87E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photo_gite ADD CONSTRAINT FK_37097BD8652CAE9B FOREIGN KEY (gite_id) REFERENCES gite (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipment_ext_gite DROP FOREIGN KEY FK_AFE16A21FA8AC0ED');
        $this->addSql('ALTER TABLE equipment_ext_gite DROP FOREIGN KEY FK_AFE16A21652CAE9B');
        $this->addSql('ALTER TABLE gite_equipment_int DROP FOREIGN KEY FK_5279F165652CAE9B');
        $this->addSql('ALTER TABLE gite_equipment_int DROP FOREIGN KEY FK_5279F16562E862B4');
        $this->addSql('ALTER TABLE gite_service DROP FOREIGN KEY FK_1527AE9A48D62931');
        $this->addSql('ALTER TABLE gite_service DROP FOREIGN KEY FK_1527AE9ABBB107EB');
        $this->addSql('ALTER TABLE photo_gite DROP FOREIGN KEY FK_37097BD87E9E4C8C');
        $this->addSql('ALTER TABLE photo_gite DROP FOREIGN KEY FK_37097BD8652CAE9B');
        $this->addSql('DROP TABLE equipment_ext');
        $this->addSql('DROP TABLE equipment_ext_gite');
        $this->addSql('DROP TABLE equipment_int');
        $this->addSql('DROP TABLE gite');
        $this->addSql('DROP TABLE gite_equipment_int');
        $this->addSql('DROP TABLE gite_service');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE photo_gite');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
