drop database if exists notnamec_db;

create database notnamec_db;
use notnamec_db;

CREATE TABLE CLIENTE (
CLI_nCOD BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT ,
CLI_cNOME VARCHAR(70),
CLI_cRG VARCHAR(15),
CLI_nCPF BIGINT(11) UNSIGNED UNIQUE,
CLI_dDTNASC DATE,
CLI_cGENERO CHAR(1),
CLI_nTRESIDENCIAL INT(10) UNSIGNED,
CLI_nTCELULAR INT(11) UNSIGNED,
CLI_nTCOMERCIAL INT(10) UNSIGNED,
CLI_cEMAIL VARCHAR(150) UNIQUE,
CLI_cSENHA VARCHAR(20),
CLI_dDTULTIMO_ACESSO TIMESTAMP NULL DEFAULT NULL,
CLI_cSTATUS VARCHAR(10),
CLI_tPREFERENCIA TEXT DEFAULT NULL
)ENGINE = INNODB;



CREATE TABLE VENDA (
VENDA_nID BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
VENDA_nVLRTOTALVENDA DOUBLE(8,2) UNSIGNED,
VENDA_dtDTCOMPRA TIMESTAMP NULL DEFAULT NULL ,
VENDA_cCODRASTREIO VARCHAR(15),
VENDA_cSTATUS ENUM ('REALIZADA', 'PENDENTE', 'CANCELADA'),
CLI_nCOD BIGINT UNSIGNED,
FOREIGN KEY (CLI_nCOD) REFERENCES CLIENTE(CLI_nCOD)
)ENGINE = INNODB;

CREATE TABLE ENDERECO (
END_nID BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
END_nCEP INT(8) UNSIGNED,
END_cLOGRADOURO VARCHAR(250),
END_cCIDADE VARCHAR(150),
END_cBAIRRO VARCHAR(150),
END_nNUMERO VARCHAR(7),
END_cCOMPLEMENTO VARCHAR(150),
END_cTIPO VARCHAR(30),
UF_nID INT UNSIGNED
)ENGINE = INNODB;

CREATE TABLE UF (
UF_nID INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
UF_cUF CHAR(2),
UF_cDESCRICAO VARCHAR(30)
)ENGINE = INNODB;

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

CREATE TABLE PREFERENCIAS_SISTEMA (
ID_PREF_SISTEMA INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
NUM_CLIQUES BIGINT UNSIGNED,
PADRAO_SISTEMA TEXT
)ENGINE = INNODB;

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

CREATE TABLE CLIENTE_ENDERECO (
CLI_END_nID BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
END_nID BIGINT UNSIGNED,
CLI_nCOD BIGINT UNSIGNED,
FOREIGN KEY(END_nID) REFERENCES ENDERECO (END_nID),
FOREIGN KEY(CLI_nCOD) REFERENCES CLIENTE (CLI_nCOD)
)ENGINE = INNODB;

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

ALTER TABLE ENDERECO ADD FOREIGN KEY(UF_nID) REFERENCES UF (UF_nID);
ALTER TABLE MODELO ADD FOREIGN KEY(PRODUTO_nID) REFERENCES PRODUTO (PRODUTO_nID);
-- ALTER TABLE VENDA_STATUS ADD FOREIGN KEY(STATUS_nID) REFERENCES STATUS_VENDA (STATUS_nID);-- 


INSERT INTO USUARIO VALUES (0, 'Ativo', 'gabriela', '123', 'Gabriela Bransford', 1, 'gabriela_bransford@icloud.com.br');
-- UPDATE USUARIO SET USR_cSTATUS = 'Inativo' WHERE USR_nCOD = 1;

INSERT INTO CLIENTE (CLI_cNOME,CLI_cEMAIL,CLI_cSENHA,CLI_cSTATUS)
        VALUES ('Sistema Notname','sistema@notname.com.br','123','Ativo');
                     


INSERT INTO CATEGORIA (CATEGORIA_cDESC,CATEGORIA_cSTATUS) VALUES ('Amarola','Ativo'),('Bela recatada e do lar','Ativo'),('Series','Ativo'),('Nerd','Ativo'), ('Believe', 'Ativo'),('Favoritas', 'Ativo');



-- INSERT INTO CATEGORIA VALUES (0, 'Peita Periculosa', 'Ativo', 1), (0, 'Raba Devastadora', 'Ativo',2);
INSERT INTO PRODUTO(PRODUTO_cDESC,PRODUTO_cDESCCOMPLETA,PRODUTO_cSTATUS,PRODUTO_tsCRIACAO,PRODUTO_tMATERIAL)
 VALUES ('Camisetas Temáticas','Produto exclusivo da nossa loja, com estampas temáticas. ','ATIVO',NOW(),'Poliester com sublimação aplicada em prensa térmica retrocolátil a 100º');
 
-- INSERT INTO PRODUTO (PRODUTO_cDESC, PRODUTO_cDESCCOMPLETA, PRODUTO_cSTATUS) VALUES ('Produto Piloto','Essa é uma descrição do produto que vai aparecer no contexto do index. Agora vamos testar um bold
--  <b>Isso é um negretto</b> <h1>Isso é um H1 gambiarrístico.</h1>','Ativo');

INSERT INTO PRODUTO_CATEGORIA (CATEGORIA_nID, PRODUTO_nID) VALUES (1,1);
INSERT INTO PRODUTO_CATEGORIA (CATEGORIA_nID, PRODUTO_nID) VALUES (2,1);

INSERT INTO TAMANHO VALUES (0, "PP", "Medidas: 50cm X 120cm"),(0, "P", "Medidas: 55cm X 125cm"),(0, "M", "Medidas: 60cm X 130cm"),
(0, "G", "Medidas: 70cm X 140cm"), (0, "GG", "Medidas: 80cm X 190cm");

INSERT INTO COR VALUES (0, "Azul", "#0000CD"), (0, "Azul Claro", "#6495ED"), (0, "Laranja", "#FF4500"),
(0, "Preto", "#000"), (0, "Branco", "#fff"), (0, "Vermelho", "#8B0000"),(0, "Laranja Claro", "#FF8C00"), 
(0, "Amarelo", "#FFFF00"), (0, "Verde", "#008000"), (0, "Marrom", "#A0522D"), (0, "Rosa", "#FF69B4"),
 (0, "Violeta", "#EE82EE");
 

 INSERT INTO MODELO(MODELO_cNOME,MODELO_nVLR_VENDA,MODELO_nSTATUS,MODELO_nDESCONTO,MODELO_nQTD_ESTOQUE,MODELO_tsCRIACAO,COR_nID,TAMANHO_nID,PRODUTO_nID)
 VALUES
 ('Camiseta Unicórnio',109.00,'Ativo',NULL,10,NOW(),3,1,1),
 ('Camiseta Mermaids',109.00,'Ativo',NULL,10,NOW(),2,2,1);
 
 INSERT INTO CATEGORIA VALUES
 (0,'LA CASA DE PAPEL','ATIVO',3),
 (0,'MR ROBOT','ATIVO',3),
 (0,'FLASH','ATIVO',3),
 (0,'ARROW','ATIVO',3);



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
where TAMANHO_nID = i---pdTamanho;
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
			UPDATE MODELO SET MODELO_nQTD_ESTOQUE = MODELO_nQTD_ESTOQUE + 1;
		
			DELETE FROM VENDA_MODELO WHERE VENDA_MODELO_nID = ID_VENDA_MODELO;
            
            SELECT 'OK' AS RESULT;
	
    ELSE
		SELECT 'APENAS UM MODELO' AS RESULT;
	END IF;

	END $$
DELIMITER ;


SELECT * FROM MODELO WHERE (SELECT COUNT(MODELO_nID) FROM VENDA_MODELO WHERE VENDA_nID = 1)>1


