drop database if exists notnamec_db;

create database notnamec_db;
use notnamec_db;

-- CREATE USER 'notnamec_usr'@'localhost' IDENTIFIED BY 'hds24@carol';
-- 
-- GRANT ALL PRIVILEGES ON * . * TO 'notnamec_usr'@'localhost';
-- 
-- SELECT * FROM mysql.user;
-- 
-- select * from INFORMATION_SCHEMA.PROCESSLIST;
-- 
CREATE TABLE CLIENTE (
CLI_nCOD BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT ,
CLI_cNOME VARCHAR(70),
CLI_cRG VARCHAR(18),
CLI_cCPF VARCHAR(15) UNIQUE,
CLI_dDTNASC DATE,
CLI_cGENERO CHAR(1),
CLI_nTRESIDENCIAL VARCHAR(15),
CLI_nTCELULAR VARCHAR(15),
CLI_nTCOMERCIAL VARCHAR(15),
CLI_cEMAIL VARCHAR(150) UNIQUE,
CLI_cSENHA VARCHAR(20),
CLI_dDTULTIMO_ACESSO TIMESTAMP NULL DEFAULT NULL,
CLI_cSTATUS VARCHAR(10),
CLI_tPREFERENCIA TEXT DEFAULT NULL
)ENGINE = INNODB;



CREATE TABLE VENDA (
VENDA_nID BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
VENDA_nVLRTOTALVENDA DOUBLE(8,2) UNSIGNED,
VENDA_cFORMA_PAGAMENTO VARCHAR(20) NULL DEFAULT NULL,
VENDA_cFRETE VARCHAR(20) NULL DEFAULT NULL,
VENDA_nVLRFRETE DOUBLE(8,2) NULL DEFAULT NULL,
VENDA_dtDTCOMPRA TIMESTAMP NULL DEFAULT NULL ,
VENDA_cCODRASTREIO VARCHAR(15),
VENDA_cSTATUS ENUM ('REALIZADA', 'PENDENTE', 'CANCELADA'),
CLI_nCOD BIGINT UNSIGNED,
FOREIGN KEY (CLI_nCOD) REFERENCES CLIENTE(CLI_nCOD)
)ENGINE = INNODB;

CREATE TABLE ENDERECO (
END_nID BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
END_nCEP varchar(10),
END_cLOGRADOURO VARCHAR(250),
END_cCIDADE VARCHAR(150),
END_cBAIRRO VARCHAR(150),
END_nNUMERO VARCHAR(7),
END_cCOMPLEMENTO VARCHAR(150),
END_cTIPO VARCHAR(30),
END_cUF VARCHAR(2),
CLI_nCOD BIGINT UNSIGNED,
FOREIGN KEY (CLI_nCOD) REFERENCES CLIENTE(CLI_nCOD)
)ENGINE = INNODB;

-- CREATE TABLE UF (
-- UF_nID INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
-- UF_cUF CHAR(2),
-- UF_cDESCRICAO VARCHAR(30)
-- )ENGINE = INNODB;

CREATE TABLE PRODUTO (
PRODUTO_nID INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
PRODUTO_cDESC VARCHAR(50),
PRODUTO_cDESCCOMPLETA TEXT,
PRODUTO_cSTATUS VARCHAR(10),
PRODUTO_tsCRIACAO TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRODUTO_tMATERIAL TEXT
)ENGINE = INNODB;

CREATE TABLE COR(
COR_nID INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
COR_cDESC VARCHAR(20),
COR_cHEX VARCHAR(20)
)ENGINE = INNODB;

CREATE TABLE TAMANHO(
TAMANHO_nID INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
TAMANHO_cTAMANHO VARCHAR(10),
TAMANHO_cDESC VARCHAR(255)
)ENGINE = INNODB;

CREATE TABLE MODELO (
MODELO_nID BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
MODELO_cNOME VARCHAR(150),
MODELO_nVLR_VENDA DOUBLE(8,2) UNSIGNED,
MODELO_nSTATUS VARCHAR(10),
MODELO_nDESCONTO DOUBLE(8,2) UNSIGNED,
MODELO_nQTD_ESTOQUE FLOAT UNSIGNED,
MODELO_tsCRIACAO TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
COR_nID INT UNSIGNED,
TAMANHO_nID INT UNSIGNED,
PRODUTO_nID INT UNSIGNED,

FOREIGN KEY (COR_nID) REFERENCES COR(COR_nID),
FOREIGN KEY (TAMANHO_nID) REFERENCES TAMANHO(TAMANHO_nID)
)ENGINE = INNODB;

CREATE TABLE COMPRA_ESTOQUE (
COMPRA_ESTOQUE_nID BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
COMPRA_ESTOQUE_nVALORTOTAL DOUBLE(8,2) UNSIGNED,
COMPRA_ESTOQUE_dDATA DATE
)ENGINE = INNODB;

CREATE TABLE MODELO_COMPRA_ESTOQUE (
MOD_COMP_ESTOQUE_nID BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
MODELO_COMPRA_ESTOQUE_nQTD FLOAT UNSIGNED,
MODELO_COMPRA_ESTOQUE_nVALOR DECIMAL(10,2) UNSIGNED,
MODELO_nID BIGINT UNSIGNED,
COMPRA_ESTOQUE_nID BIGINT UNSIGNED,
FOREIGN KEY(MODELO_nID) REFERENCES MODELO (MODELO_nID),
FOREIGN KEY(COMPRA_ESTOQUE_nID) REFERENCES COMPRA_ESTOQUE (COMPRA_ESTOQUE_nID)
)ENGINE = INNODB;

CREATE TABLE USUARIO (
USR_nCOD INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
USR_cSTATUS VARCHAR(10),
USR_cLOGIN VARCHAR(20) UNIQUE,
USR_cSENHA VARCHAR(20),
USR_cNOME VARCHAR(100),
USR_nPERMISSAO TINYINT UNSIGNED,
USR_EMAIL VARCHAR(100)
)ENGINE = INNODB;

-- CREATE TABLE PREFERENCIAS_SISTEMA (
-- ID_PREF_SISTEMA INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
-- NUM_CLIQUES BIGINT UNSIGNED,
-- PADRAO_SISTEMA TEXT
-- )ENGINE = INNODB;

CREATE TABLE VENDA_MODELO (
VENDA_MODELO_nID BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
VENDA_MODELO_tsDT_SEPARACAO TIMESTAMP NULL DEFAULT NULL ,
VENDA_MODELO_QDTE FLOAT UNSIGNED,
VENDA_MODELO_dVLR_MODELO DECIMAL(10,2),
VENDA_nID BIGINT UNSIGNED,
MODELO_nID BIGINT UNSIGNED,

FOREIGN KEY(VENDA_nID) REFERENCES VENDA (VENDA_nID),
FOREIGN KEY(MODELO_nID) REFERENCES MODELO (MODELO_nID)
)ENGINE = INNODB;


CREATE TABLE CATEGORIA (
CATEGORIA_nID INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
CATEGORIA_cDESC VARCHAR(99),
CATEGORIA_cSTATUS VARCHAR(10),
CATEGORIA_nCODPAI INT UNSIGNED NULL DEFAULT NULL
)ENGINE = INNODB;

CREATE TABLE PRODUTO_CATEGORIA (
PRODUTO_CATEGORIA_nID INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
CATEGORIA_nID INT UNSIGNED,
PRODUTO_nID INT UNSIGNED,
FOREIGN KEY(CATEGORIA_nID) REFERENCES CATEGORIA (CATEGORIA_nID),
FOREIGN KEY(PRODUTO_nID) REFERENCES PRODUTO (PRODUTO_nID)
)ENGINE = INNODB;

-- CREATE TABLE CLIENTE_ENDERECO (
-- CLI_END_nID BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
-- END_nID BIGINT UNSIGNED,
-- CLI_nCOD BIGINT UNSIGNED,
-- FOREIGN KEY(END_nID) REFERENCES ENDERECO (END_nID),
-- FOREIGN KEY(CLI_nCOD) REFERENCES CLIENTE (CLI_nCOD)
-- )ENGINE = INNODB;

-- CREATE TABLE VENDA_STATUS (
-- VENDA_STA_nID BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
-- STATUS_nID INT UNSIGNED,
-- VENDA_nID BIGINT UNSIGNED,
-- VENDA_STATUS_dDT_ATUALIZACAO TIMESTAMP NULL DEFAULT NULL,
-- FOREIGN KEY(VENDA_nID) REFERENCES VENDA (VENDA_nID)
-- )ENGINE = INNODB;
-- 
-- CREATE TABLE STATUS_VENDA (
-- STATUS_nID INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
-- STATUS_cDESC VARCHAR(250)
-- )ENGINE = INNODB;
-- 

-- ALTER TABLE ENDERECO ADD FOREIGN KEY(UF_nID) REFERENCES UF (UF_nID);-- 
ALTER TABLE MODELO ADD FOREIGN KEY(PRODUTO_nID) REFERENCES PRODUTO (PRODUTO_nID);
-- ALTER TABLE VENDA_STATUS ADD FOREIGN KEY(STATUS_nID) REFERENCES STATUS_VENDA (STATUS_nID);-- 


INSERT INTO USUARIO VALUES (0, 'Ativo', 'gabriela', '123', 'Gabriela Bransford', 1, 'gabriela_bransford@icloud.com.br');
-- UPDATE USUARIO SET USR_cSTATUS = 'Inativo' WHERE USR_nCOD = 1;

INSERT INTO CLIENTE (CLI_cNOME,CLI_cEMAIL,CLI_cSENHA,CLI_cSTATUS)
        VALUES ('Sistema Notname','sistema@notname.com.br','123','Ativo');
                     

-- INSERT INTO CATEGORIA VALUES (0, 'Peita Periculosa', 'Ativo', 1), (0, 'Raba Devastadora', 'Ativo',2);

-- INSERT INTO PRODUTO (PRODUTO_cDESC, PRODUTO_cDESCCOMPLETA, PRODUTO_cSTATUS) VALUES ('Produto Piloto','Essa é uma descrição do produto que vai aparecer no contexto do index. Agora vamos testar um bold
--  <b>Isso é um negretto</b> <h1>Isso é um H1 gambiarrístico.</h1>','Ativo');



INSERT INTO TAMANHO VALUES (0, 'PP', 'Medidas: 50cm X 120cm'),(0, 'P', 'Medidas: 55cm X 125cm'),(0, 'M', 'Medidas: 60cm X 130cm'),
(0, 'G', 'Medidas: 70cm X 140cm'), (0, 'GG', 'Medidas: 80cm X 190cm');

INSERT INTO COR VALUES (0, 'Azul', '#0000CD'), (0, 'Azul Claro', '#6495ED'), (0, 'Laranja', '#FF4500'),
(0, 'Preto', '#000'), (0, 'Branco', '#fff'), (0, 'Vermelho', '#8B0000'),(0, 'Laranja Claro', '#FF8C00'), 
(0, 'Amarelo', '#FFFF00'), (0, 'Verde', '#008000'), (0, 'Marrom', '#A0522D'), (0, 'Rosa', '#FF69B4'),
 (0, 'Violeta', '#EE82EE');
 
-- INSERT INTO UF VALUES 
-- (0, 'SP', 'São Paulo'),
-- (0, 'RJ', 'Rio de Janeiro'),
-- (0, 'MG', 'Minas Gerais'),
-- (0, 'SC', 'Santa Catarina'),
-- (0, 'AC', 'Acre'),
-- (0, 'AL', 'Alagoas'),
-- (0, 'AP', 'Amapá'),
-- (0, 'AM', 'Amazonas'),
-- (0, 'BA', 'Bahia'),
-- (0, 'CE', 'Ceará'),
-- (0, 'DF', 'Distrito Federal'),
-- (0, 'ES', 'Espírito Santo'),
-- (0, 'GO', 'Goiás'),
-- (0, 'MA', 'Maranhão'),
-- (0, 'MT', 'Mato Grosso'),
-- (0, 'MS', 'Mato Grosso do Sul'),
-- (0, 'PA', 'Pará'),
-- (0, 'PB', 'Paraíba'),
-- (0, 'PR', 'Paraná'),
-- (0, 'PE', 'Pernambuco'),
-- (0, 'PI', 'Piauí'),
-- (0, 'RN', 'Rio Grande do Norte'),
-- (0, 'RS', 'Rio Grande do Sul'),
-- (0, 'RO', 'Rondônia'),
-- (0, 'RR', 'Roraima'),
-- (0, 'SE', 'Sergipe'),
-- (0, 'TO', 'Tocantins');
-- 

INSERT INTO CATEGORIA(CATEGORIA_nID,CATEGORIA_cDESC,CATEGORIA_cSTATUS,CATEGORIA_nCODPAI) VALUES
(1,'Amarola','Ativo',NULL),
(2,'Bela recatada e do lar','Ativo',NULL),
(3,'Series','Ativo',NULL),
(4,'Nerd','Ativo',NULL),
(5,'Believe','Ativo',NULL),
(6,'Favoritas','Ativo',NULL),
(7,'LA CASA DE PAPEL','ATIVO',3),
(8,'MR ROBOT','ATIVO',3),
(9,'FLASH','ATIVO',3),
(10,'ARROW','ATIVO',3),
(11,'Chá','ATIVO',1),
(12,'Bela recata e do lar','ATIVO',2);

INSERT INTO PRODUTO(PRODUTO_nID,PRODUTO_cDESC,PRODUTO_cDESCCOMPLETA,PRODUTO_cSTATUS,PRODUTO_tsCRIACAO,PRODUTO_tMATERIAL) VALUES
(1,'Camisetas Temáticas','Produto exclusivo da nossa loja, com estampas temáticas. ','ATIVO','2018-06-28 15:21:46','Poliester com sublimação aplicada em prensa térmica retrocolátil a 100º'),
(2,'Camiseta Chá - Branca','Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ','ATIVO','2018-06-28 15:54:41','Algodão'),
(3,'Camiseta Sea Smoke','Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ','ATIVO','2018-06-28 15:48:17','Algodão'),
(4,'Camiseta Chá - Preto','Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ','ATIVO','2018-06-28 15:55:24','Algodão'),
(5,'Camiseta Bitch - Preta','Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ','ATIVO','2018-06-28 16:00:37','Algodão'),
(6,'Camiseta Compare - Branca','Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ','ATIVO','2018-06-28 16:02:35','Algodão'),
(7,'Camiseta Fight - Preta','Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ','ATIVO','2018-06-28 16:03:08','Algodão'),
(8,'Camiseta Mybody - Branca','Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ','ATIVO','2018-06-28 16:03:49','Algodão'),
(9,'Camiseta Power Girl - Branca','Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ','ATIVO','2018-06-28 16:04:54','Algodão'),
(10,'Camista Satan - Preta','Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ','ATIVO','2018-06-28 16:06:51','Algodão'),
(11,'Camiseta Fight - Branca','Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ','ATIVO','2018-06-28 16:07:27','Algodão');

INSERT INTO PRODUTO_CATEGORIA(PRODUTO_CATEGORIA_nID,CATEGORIA_nID,PRODUTO_nID) VALUES
(1,1,1),
(2,2,1),
(8,1,3),
(9,11,3),
(10,1,2),
(11,11,2),
(12,1,4),
(13,11,4),
(15,2,5),
(16,12,5),
(17,2,6),
(18,12,6),
(19,2,7),
(20,12,7),
(21,2,8),
(22,12,8),
(25,2,9),
(26,12,9),
(27,2,10),
(28,12,10),
(29,2,11),
(30,12,11);

INSERT INTO MODELO (MODELO_nID,MODELO_cNOME,MODELO_nVLR_VENDA,MODELO_nSTATUS,MODELO_nDESCONTO,MODELO_nQTD_ESTOQUE,MODELO_tsCRIACAO,COR_nID,TAMANHO_nID,PRODUTO_nID) VALUES
(1,'Camiseta Unicórnio',109.00,'Ativo',NULL,10,'2018-06-28 15:21:46',3,1,1),
(2,'Camiseta Mermaids',109.00,'Ativo',NULL,10,'2018-06-28 15:21:46',2,2,1),
(3,'Camiseta Chá',45.00,'Ativo',0.00,10,'2018-06-28 15:38:01',5,2,2),
(4,'Camiseta Chá',45.00,'Ativo',0.00,10,'2018-06-28 15:55:54',5,3,2),
(5,'Camiseta Chá',45.00,'Ativo',0.00,10,'2018-06-28 15:56:02',5,4,2),
(6,'Camiseta Chá',45.00,'Ativo',0.00,10,'2018-06-28 15:56:28',4,2,4),
(7,'Camiseta Chá',45.00,'Ativo',0.00,10,'2018-06-28 15:56:09',4,3,4),
(8,'Camiseta Chá',45.00,'Ativo',0.00,10,'2018-06-28 15:56:17',4,4,4),
(9,'Camiseta Sea Smoke',45.00,'Ativo',0.00,10,'2018-06-28 15:49:00',4,2,3),
(10,'Camiseta Bitch - Preta',45.00,'Ativo',0.00,10,'2018-06-28 16:09:59',4,2,5),
(11,'Camiseta Compare - Branca',45.00,'Ativo',0.00,10,'2018-06-28 16:15:05',5,2,6),
(12,'Camiseta Fight - Preta',45.00,'Ativo',0.00,10,'2018-06-28 16:15:59',4,3,7),
(13,'Camiseta Mybody - Branca',45.00,'Ativo',0.00,10,'2018-06-28 16:19:06',5,3,8),
(14,'Camiseta Power Girl - Branca',45.00,'Ativo',0.00,10,'2018-06-28 16:23:49',5,3,9),
(15,'Camiseta Satan - Preta',45.00,'Ativo',0.00,10,'2018-06-28 16:36:11',4,3,10),
(16,'Camiseta Fight - Branca ',45.00,'Ativo',0.00,10,'2018-06-28 16:38:07',5,3,11);


DELIMITER $$
	CREATE PROCEDURE USP_LOGIN(IN LOGIN VARCHAR(20), IN SENHA VARCHAR(20))
	BEGIN
      
	IF EXISTS(SELECT * FROM USUARIO WHERE USR_cLOGIN = LOGIN && USR_cSENHA = SENHA)
	THEN
		IF EXISTS(SELECT USR_nCOD FROM USUARIO WHERE USR_cLOGIN = LOGIN AND USR_cSENHA = SENHA AND USR_cSTATUS = 'Ativo')
        THEN
        SELECT USR_nCOD FROM USUARIO WHERE USR_cLOGIN = LOGIN AND USR_cSENHA = SENHA INTO @HANDSHAKE;
        
        ELSE
		SELECT 'Usuário Inativo' INTO @HANDSHAKE;
        
        END IF;
        
        SELECT @HANDSHAKE AS HANDSHAKE;
	ELSE
		SELECT 'Login ou Senha Inválidos' AS HANDSHAKE;
	END IF;

	END $$
DELIMITER ;



DELIMITER $$
create function fn_buscaDescCategoriaPai(idCatPai int)
returns varchar(50)
begin
declare nomeCategoria varchar(50);
select CATEGORIA_cDESC into nomeCategoria
from CATEGORIA
where CATEGORIA_nID = idCatPai;
return nomeCategoria;
end $$
DELIMITER ;

DELIMITER $$
create function fn_buscaHexCor(idCor int)
returns varchar(10)
begin
declare hexCor varchar(10);
select COR_cHEX into hexCor
from COR
where COR_nID = idCor;
return hexCor;
end $$
DELIMITER ;

DELIMITER $$
create function fn_buscaDescCor(idCor int)
returns varchar(10)
begin
declare descCor varchar(10);
select COR_cDESC into descCor
from COR
where COR_nID = idCor;
return descCor;
end $$
DELIMITER ;

DELIMITER $$
create function fn_buscaDescProduto(idProduto int)
returns varchar(80)
begin
declare descProduto varchar(80);
select PRODUTO_cDESC into descProduto
from PRODUTO
where PRODUTO_nID = idProduto;
return descProduto;
end $$
DELIMITER ;

DELIMITER $$
create function fn_buscaDescTamanho(idTamanho int)
returns varchar(20)
begin
declare descTamanho varchar(20);
select TAMANHO_cTAMANHO into descTamanho
from TAMANHO
where TAMANHO_nID = idTamanho;
return descTamanho;
end $$
DELIMITER ;

DELIMITER $$
	CREATE PROCEDURE USP_VENDA_MODELO(IN ID_MODELO BIGINT, IN ID_VENDA BIGINT, IN QUANTIDADE INT, IN VALOR_MODELO DOUBLE)
	BEGIN
      
	IF EXISTS(SELECT * FROM MODELO WHERE MODELO_nID = ID_MODELO AND MODELO_nQTD_ESTOQUE > 0 )
	THEN
		INSERT INTO VENDA_MODELO (VENDA_MODELO_tsDT_SEPARACAO, VENDA_MODELO_QDTE, VENDA_MODELO_dVLR_MODELO, 
        VENDA_nID, MODELO_nID)
        VALUES(NOW(), QUANTIDADE, VALOR_MODELO, ID_VENDA, ID_MODELO);
        
        UPDATE VENDA SET VENDA_nVLRTOTALVENDA = VENDA_nVLRTOTALVENDA + VALOR_MODELO WHERE VENDA_nID = ID_VENDA;
        
        UPDATE MODELO SET MODELO_nQTD_ESTOQUE = MODELO_nQTD_ESTOQUE - QUANTIDADE WHERE MODELO_nID = ID_MODELO;
        
        SELECT COUNT(VENDA_nID) as COUNT_MODELOS FROM VENDA_MODELO WHERE VENDA_nID = ID_VENDA;
	
    ELSE
		SELECT 'SEM ESTOQUE' as COUNT_MODELOS;
	END IF;

	END $$
DELIMITER ;


DELIMITER $$
	CREATE PROCEDURE USP_DELETA_MODELO(IN ID_MODELO BIGINT, IN ID_VENDA BIGINT, IN ID_VENDA_MODELO BIGINT)
	BEGIN
      
	IF EXISTS(SELECT * FROM VENDA_MODELO WHERE (SELECT COUNT(MODELO_nID) FROM VENDA_MODELO WHERE VENDA_nID = ID_VENDA)>1)
	THEN
			UPDATE MODELO SET MODELO_nQTD_ESTOQUE = MODELO_nQTD_ESTOQUE + 1 WHERE MODELO_nID = ID_MODELO;
		
			DELETE FROM VENDA_MODELO WHERE VENDA_MODELO_nID = ID_VENDA_MODELO;
            
            SELECT 'OK' AS RESULT;
	
    ELSE
		SELECT 'APENAS UM MODELO' AS RESULT;
	END IF;

	END $$
DELIMITER ;

-- set global sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
-- 
-- set session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
-- 

select * from VENDA;

SELECT * FROM ENDERECO WHERE CLI_nCOD = 1;


