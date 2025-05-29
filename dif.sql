-- 15/04/2025
-- doctrine:schema:update --dump-sql > dif.sql
CREATE TABLE empsys__modelo_empilhadeira (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fabricante VARCHAR(50) NOT NULL, modelo VARCHAR(50) NOT NULL, carga_total DOUBLE PRECISION NOT NULL, caracteristicas CLOB DEFAULT NULL, aplicacoes CLOB DEFAULT NULL);
CREATE TABLE empsys__cliente (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, razao_social VARCHAR(255) NOT NULL, nome_fantasia VARCHAR(255) DEFAULT NULL, cnpj VARCHAR(15) NOT NULL, ativo BOOLEAN NOT NULL);
CREATE TABLE empsys__local (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cliente_id INTEGER DEFAULT NULL, nome VARCHAR(255) NOT NULL, endereco VARCHAR(255) NOT NULL, cidade VARCHAR(255) NOT NULL, estado VARCHAR(10) NOT NULL, cep VARCHAR(15) NOT NULL, observacao VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_52679135DE734E51 FOREIGN KEY (cliente_id) REFERENCES empsys__cliente (id) NOT DEFERRABLE INITIALLY IMMEDIATE);
CREATE INDEX IDX_52679135DE734E51 ON empsys__local (cliente_id);
CREATE TABLE empsys__lista_empilhadeira (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, modelo_id INTEGER NOT NULL, cliente_id INTEGER DEFAULT NULL, local_id INTEGER NOT NULL, CONSTRAINT FK_58DD4C2EC3A9576E FOREIGN KEY (modelo_id) REFERENCES empsys__modelo_empilhadeira (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_58DD4C2EDE734E51 FOREIGN KEY (cliente_id) REFERENCES empsys__cliente (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_58DD4C2E5D5A2101 FOREIGN KEY (local_id) REFERENCES empsys__local (id) NOT DEFERRABLE INITIALLY IMMEDIATE);
CREATE INDEX IDX_58DD4C2EC3A9576E ON empsys__lista_empilhadeira (modelo_id);
CREATE INDEX IDX_58DD4C2EDE734E51 ON empsys__lista_empilhadeira (cliente_id);
CREATE INDEX IDX_58DD4C2E5D5A2101 ON empsys__lista_empilhadeira (local_id);

-- 28/05/2025
-- INSERTS

INSERT INTO empsys__modelo_empilhadeira (fabricante, modelo, carga_total, caracteristicas, aplicacoes) VALUES ('Hyster', 'H50FT', 5000, 'Motor diesel robusto; Transmissão automática; Sistema de controle de velocidade adaptativo; Cabine com isolamento acústico', 'Construção pesada; Logística de carga pesada; Portos e terminais');

INSERT INTO empsys__modelo_empilhadeira (fabricante, modelo, carga_total, caracteristicas, aplicacoes) VALUES ('Toyota', '8FGCU25', 2500, 'Motor a gás LPG; Sistema de estabilidade automática; Ergonomia avançada com assento ajustável;
Sistema de frenagem regenerativa.', 'Armazenagem em pátios; Manuseio de cargas paletizadas; Indústrias de médio porte');

INSERT INTO empsys__modelo_empilhadeira (fabricante, modelo, carga_total, caracteristicas, aplicacoes) VALUES ('Yale', 'GDP30VX', 3000, 'Motor elétrico com bateria de alta capacidade; Direção assistida elétrica; Sistema de recuperação de energia; Display digital para monitoramento', 'Armazéns internos; Indústrias de alimentos e bebidas; Centros de distribuição');

INSERT INTO empsys__modelo_empilhadeira (fabricante, modelo, carga_total, caracteristicas, aplicacoes) VALUES ('Clark', 'C30D', 3000, 'Motor diesel ou LPG (versão flex); Sistema de segurança antiqueda de carga; Suspensão ergonômica do operador; Fácil manutenção', 'Manuseio em áreas externas e internas; Indústrias químicas e metalúrgicas; Transporte de materiais pesados');

INSERT INTO empsys__modelo_empilhadeira (fabricante, modelo, carga_total, caracteristicas, aplicacoes) VALUES ('Komatsu', 'FG25T-16', 2500, 'Motor a gás LPG; Transmissão hidrostática; Sistema avançado de segurança; Controle eletrônico de aceleração', 'Indústrias automotivas; Centros de logística; Manuseio de cargas médias');

INSERT INTO empsys__cliente (razao_social, nome_fantasia, cnpj, ativo) VALUES ('Relâmpago McQueen', 'Relâmpago Marquinhos', '95', 1);

INSERT INTO empsys__local (nome, endereco, cidade, estado, cep, observacao, cliente_id) VALUES ('Depósito do Mate', 'Radiator Springs', 'Condado Carburetor', 'Gallup', '00012351', 'Local onde o Relâmpago McQueen foi detido após destruir a cidade', 1);

INSERT INTO empsys__lista_empilhadeira (modelo_id, cliente_id, local_id) VALUES (4, 1, 1);
