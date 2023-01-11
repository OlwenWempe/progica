<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230111151854 extends AbstractMigration
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
        $this->addSql('CREATE TABLE gite_service (id INT AUTO_INCREMENT NOT NULL, id_service_id INT DEFAULT NULL, id_gite_id INT DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, INDEX IDX_1527AE9A48D62931 (id_service_id), INDEX IDX_1527AE9ABBB107EB (id_gite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, photo_link VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo_gite (photo_id INT NOT NULL, gite_id INT NOT NULL, INDEX IDX_37097BD87E9E4C8C (photo_id), INDEX IDX_37097BD8652CAE9B (gite_id), PRIMARY KEY(photo_id, gite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipment_ext_gite ADD CONSTRAINT FK_AFE16A21FA8AC0ED FOREIGN KEY (equipment_ext_id) REFERENCES equipment_ext (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipment_ext_gite ADD CONSTRAINT FK_AFE16A21652CAE9B FOREIGN KEY (gite_id) REFERENCES gite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gite_service ADD CONSTRAINT FK_1527AE9A48D62931 FOREIGN KEY (id_service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE gite_service ADD CONSTRAINT FK_1527AE9ABBB107EB FOREIGN KEY (id_gite_id) REFERENCES gite (id)');
        $this->addSql('ALTER TABLE photo_gite ADD CONSTRAINT FK_37097BD87E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photo_gite ADD CONSTRAINT FK_37097BD8652CAE9B FOREIGN KEY (gite_id) REFERENCES gite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gite ADD adress VARCHAR(255) NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD zipcode VARCHAR(255) NOT NULL, ADD departement VARCHAR(255) NOT NULL, ADD region VARCHAR(255) NOT NULL, ADD surface DOUBLE PRECISION NOT NULL, ADD rooms INT NOT NULL, ADD beds INT NOT NULL, ADD animal_allowed TINYINT(1) NOT NULL, ADD animal_cost DOUBLE PRECISION DEFAULT NULL, ADD disponibilities LONGTEXT NOT NULL, ADD description LONGTEXT DEFAULT NULL, ADD green_price INT NOT NULL, ADD red_price INT DEFAULT NULL, ADD start_red DATE DEFAULT NULL, ADD end_red DATE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipment_ext_gite DROP FOREIGN KEY FK_AFE16A21FA8AC0ED');
        $this->addSql('ALTER TABLE equipment_ext_gite DROP FOREIGN KEY FK_AFE16A21652CAE9B');
        $this->addSql('ALTER TABLE gite_service DROP FOREIGN KEY FK_1527AE9A48D62931');
        $this->addSql('ALTER TABLE gite_service DROP FOREIGN KEY FK_1527AE9ABBB107EB');
        $this->addSql('ALTER TABLE photo_gite DROP FOREIGN KEY FK_37097BD87E9E4C8C');
        $this->addSql('ALTER TABLE photo_gite DROP FOREIGN KEY FK_37097BD8652CAE9B');
        $this->addSql('DROP TABLE equipment_ext');
        $this->addSql('DROP TABLE equipment_ext_gite');
        $this->addSql('DROP TABLE gite_service');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE photo_gite');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE gite DROP adress, DROP city, DROP zipcode, DROP departement, DROP region, DROP surface, DROP rooms, DROP beds, DROP animal_allowed, DROP animal_cost, DROP disponibilities, DROP description, DROP green_price, DROP red_price, DROP start_red, DROP end_red');
    }
}
