<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250415132831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE empsys__cliente (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, razao_social VARCHAR(255) NOT NULL, nome_fantasia VARCHAR(255) DEFAULT NULL, cnpj VARCHAR(15) NOT NULL, ativo BOOLEAN NOT NULL)');
        $this->addSql('CREATE TABLE empsys__lista_empilhadeira (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, modelo_id INTEGER NOT NULL, cliente_id INTEGER DEFAULT NULL, local_id INTEGER NOT NULL, CONSTRAINT FK_58DD4C2EC3A9576E FOREIGN KEY (modelo_id) REFERENCES empsys__modelo_empilhadeira (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_58DD4C2EDE734E51 FOREIGN KEY (cliente_id) REFERENCES empsys__cliente (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_58DD4C2E5D5A2101 FOREIGN KEY (local_id) REFERENCES empsys__local (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_58DD4C2EC3A9576E ON empsys__lista_empilhadeira (modelo_id)');
        $this->addSql('CREATE INDEX IDX_58DD4C2EDE734E51 ON empsys__lista_empilhadeira (cliente_id)');
        $this->addSql('CREATE INDEX IDX_58DD4C2E5D5A2101 ON empsys__lista_empilhadeira (local_id)');
        $this->addSql('CREATE TABLE empsys__local (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cliente_id INTEGER DEFAULT NULL, nome VARCHAR(255) NOT NULL, endereco VARCHAR(255) NOT NULL, cidade VARCHAR(255) NOT NULL, estado VARCHAR(10) NOT NULL, cep VARCHAR(15) NOT NULL, observacao VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_52679135DE734E51 FOREIGN KEY (cliente_id) REFERENCES empsys__cliente (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_52679135DE734E51 ON empsys__local (cliente_id)');
        $this->addSql('CREATE TABLE empsys__modelo_empilhadeira (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fabricante VARCHAR(50) NOT NULL, modelo VARCHAR(50) NOT NULL, carga_total DOUBLE PRECISION NOT NULL, caracteristicas CLOB DEFAULT NULL, aplicacoes CLOB DEFAULT NULL)');
        $this->addSql('DROP TABLE empilhadeira');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE empilhadeira (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fabricante VARCHAR(50) NOT NULL COLLATE "BINARY", modelo VARCHAR(50) NOT NULL COLLATE "BINARY", carga_total DOUBLE PRECISION NOT NULL, caracteristicas CLOB DEFAULT NULL COLLATE "BINARY", aplicacoes CLOB DEFAULT NULL COLLATE "BINARY")');
        $this->addSql('DROP TABLE empsys__cliente');
        $this->addSql('DROP TABLE empsys__lista_empilhadeira');
        $this->addSql('DROP TABLE empsys__local');
        $this->addSql('DROP TABLE empsys__modelo_empilhadeira');
    }
}
