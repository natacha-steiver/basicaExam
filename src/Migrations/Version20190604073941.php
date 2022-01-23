<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190604073941 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE auteurs (id INT UNSIGNED AUTO_INCREMENT NOT NULL, nom VARCHAR(45) NOT NULL, slug VARCHAR(45) NOT NULL, prenom VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT UNSIGNED AUTO_INCREMENT NOT NULL, nomfr VARCHAR(45) NOT NULL, nomen VARCHAR(45) NOT NULL, slug VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories_has_posts (categories INT UNSIGNED NOT NULL, posts INT UNSIGNED NOT NULL, INDEX IDX_2C07DCE53AF34668 (categories), INDEX IDX_2C07DCE5885DBAFA (posts), PRIMARY KEY(categories, posts)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients (id INT UNSIGNED AUTO_INCREMENT NOT NULL, nom VARCHAR(45) NOT NULL, slug VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comptes (id INT UNSIGNED AUTO_INCREMENT NOT NULL, nom VARCHAR(45) NOT NULL, slug VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pages (id INT UNSIGNED AUTO_INCREMENT NOT NULL, titrefr VARCHAR(45) NOT NULL, titreen VARCHAR(45) NOT NULL, textefr TEXT DEFAULT NULL, texteen TEXT DEFAULT NULL, slug VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE posts (id INT UNSIGNED AUTO_INCREMENT NOT NULL, comptes INT UNSIGNED DEFAULT NULL, image VARCHAR(45) NOT NULL, updated_at DATETIME NOT NULL, titrefr VARCHAR(45) NOT NULL, titreen VARCHAR(45) NOT NULL, imagesize VARCHAR(45) NOT NULL, textefr TEXT DEFAULT NULL, texteen TEXT DEFAULT NULL, date_creation DATETIME DEFAULT NULL, slug VARCHAR(45) NOT NULL, INDEX IDX_885DBAFA56735801 (comptes), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rubriques (id INT UNSIGNED AUTO_INCREMENT NOT NULL, titreFr VARCHAR(45) NOT NULL, titreEn VARCHAR(45) NOT NULL, slug VARCHAR(45) NOT NULL, texteFr TEXT DEFAULT NULL, texteEn TEXT DEFAULT NULL, image VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags (id INT UNSIGNED AUTO_INCREMENT NOT NULL, nomFr VARCHAR(45) NOT NULL, nomEn VARCHAR(45) NOT NULL, slug VARCHAR(45) NOT NULL, nombreTagsPartage INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_957A6479C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE works (id INT UNSIGNED AUTO_INCREMENT NOT NULL, auteurs INT UNSIGNED DEFAULT NULL, clients INT UNSIGNED DEFAULT NULL, titreFr VARCHAR(45) NOT NULL, titreEn VARCHAR(45) NOT NULL, image VARCHAR(45) DEFAULT NULL, updated_at DATETIME NOT NULL, imagesize VARCHAR(45) NOT NULL, texteFr TEXT DEFAULT NULL, texteEn TEXT DEFAULT NULL, date_creation DATETIME DEFAULT NULL, slug VARCHAR(45) NOT NULL, INDEX IDX_F6E502436DD7D42A (auteurs), INDEX IDX_F6E50243C82E74 (clients), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE works_has_tags (works INT UNSIGNED NOT NULL, tags INT UNSIGNED NOT NULL, INDEX IDX_2B494112F6E50243 (works), INDEX IDX_2B4941126FBC9426 (tags), PRIMARY KEY(works, tags)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categories_has_posts ADD CONSTRAINT FK_2C07DCE53AF34668 FOREIGN KEY (categories) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE categories_has_posts ADD CONSTRAINT FK_2C07DCE5885DBAFA FOREIGN KEY (posts) REFERENCES posts (id)');
        $this->addSql('ALTER TABLE posts ADD CONSTRAINT FK_885DBAFA56735801 FOREIGN KEY (comptes) REFERENCES comptes (id)');
        $this->addSql('ALTER TABLE works ADD CONSTRAINT FK_F6E502436DD7D42A FOREIGN KEY (auteurs) REFERENCES auteurs (id)');
        $this->addSql('ALTER TABLE works ADD CONSTRAINT FK_F6E50243C82E74 FOREIGN KEY (clients) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE works_has_tags ADD CONSTRAINT FK_2B494112F6E50243 FOREIGN KEY (works) REFERENCES works (id)');
        $this->addSql('ALTER TABLE works_has_tags ADD CONSTRAINT FK_2B4941126FBC9426 FOREIGN KEY (tags) REFERENCES tags (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE works DROP FOREIGN KEY FK_F6E502436DD7D42A');
        $this->addSql('ALTER TABLE categories_has_posts DROP FOREIGN KEY FK_2C07DCE53AF34668');
        $this->addSql('ALTER TABLE works DROP FOREIGN KEY FK_F6E50243C82E74');
        $this->addSql('ALTER TABLE posts DROP FOREIGN KEY FK_885DBAFA56735801');
        $this->addSql('ALTER TABLE categories_has_posts DROP FOREIGN KEY FK_2C07DCE5885DBAFA');
        $this->addSql('ALTER TABLE works_has_tags DROP FOREIGN KEY FK_2B4941126FBC9426');
        $this->addSql('ALTER TABLE works_has_tags DROP FOREIGN KEY FK_2B494112F6E50243');
        $this->addSql('DROP TABLE auteurs');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE categories_has_posts');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE comptes');
        $this->addSql('DROP TABLE pages');
        $this->addSql('DROP TABLE posts');
        $this->addSql('DROP TABLE rubriques');
        $this->addSql('DROP TABLE tags');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('DROP TABLE works');
        $this->addSql('DROP TABLE works_has_tags');
    }
}
