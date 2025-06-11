CREATE TABLE empsys_maquina__fabricante (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome VARCHAR(60) NOT NULL, ativo BOOLEAN NOT NULL);
CREATE TABLE empsys_maquina__modelo (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fabricante_id INTEGER NOT NULL, nome VARCHAR(255) NOT NULL, carga_total DOUBLE PRECISION NOT NULL, caracteristicas CLOB DEFAULT NULL, aplicacoes CLOB DEFAULT NULL, ativo BOOLEAN NOT NULL, CONSTRAINT FK_FD6D6DE8C0A0FDFA FOREIGN KEY (fabricante_id) REFERENCES empsys_maquina__fabricante (id) NOT DEFERRABLE INITIALLY IMMEDIATE);
CREATE INDEX IDX_FD6D6DE8C0A0FDFA ON empsys_maquina__modelo (fabricante_id);
CREATE TEMPORARY TABLE __temp__empsys__lista_empilhadeira AS SELECT id, modelo_id, cliente_id, local_id FROM empsys__lista_empilhadeira;
DROP TABLE empsys__lista_empilhadeira;
CREATE TABLE empsys__lista_empilhadeira (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, modelo_id INTEGER NOT NULL, cliente_id INTEGER DEFAULT NULL, local_id INTEGER NOT NULL, CONSTRAINT FK_58DD4C2EC3A9576E FOREIGN KEY (modelo_id) REFERENCES empsys_maquina__modelo (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_58DD4C2EDE734E51 FOREIGN KEY (cliente_id) REFERENCES empsys__cliente (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_58DD4C2E5D5A2101 FOREIGN KEY (local_id) REFERENCES empsys__local (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE);
INSERT INTO empsys__lista_empilhadeira (id, modelo_id, cliente_id, local_id) SELECT id, modelo_id, cliente_id, local_id FROM __temp__empsys__lista_empilhadeira;
DROP TABLE __temp__empsys__lista_empilhadeira;
CREATE INDEX IDX_58DD4C2E5D5A2101 ON empsys__lista_empilhadeira (local_id);
CREATE INDEX IDX_58DD4C2EDE734E51 ON empsys__lista_empilhadeira (cliente_id);
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
