<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210311124552 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, titre VARCHAR(255) DEFAULT NULL, INDEX IDX_94D4687F19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cv (id INT AUTO_INCREMENT NOT NULL, id_image_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B66FFE926D7EC9F8 (id_image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, id_client_id INT DEFAULT NULL, societe VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, INDEX IDX_590C10399DED506 (id_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, societe VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, INDEX IDX_404021BF19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, id_projet_id INT DEFAULT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_C53D045F80F43E55 (id_projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE langue (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, INDEX IDX_9357758E19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loisir (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, INDEX IDX_CF3B206019EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE portfolio (id INT AUTO_INCREMENT NOT NULL, id_image_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_A9ED10626D7EC9F8 (id_image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_50159CA919EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competence ADD CONSTRAINT FK_94D4687F19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE cv ADD CONSTRAINT FK_B66FFE926D7EC9F8 FOREIGN KEY (id_image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C10399DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F80F43E55 FOREIGN KEY (id_projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE langue ADD CONSTRAINT FK_9357758E19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE loisir ADD CONSTRAINT FK_CF3B206019EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE portfolio ADD CONSTRAINT FK_A9ED10626D7EC9F8 FOREIGN KEY (id_image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE client ADD bio LONGTEXT DEFAULT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD genre INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cv DROP FOREIGN KEY FK_B66FFE926D7EC9F8');
        $this->addSql('ALTER TABLE portfolio DROP FOREIGN KEY FK_A9ED10626D7EC9F8');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F80F43E55');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE cv');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE langue');
        $this->addSql('DROP TABLE loisir');
        $this->addSql('DROP TABLE portfolio');
        $this->addSql('DROP TABLE projet');
        $this->addSql('ALTER TABLE client DROP bio, DROP prenom, DROP genre');
    }
}
