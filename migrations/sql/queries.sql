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

select * from empsys_maquina__modelo;