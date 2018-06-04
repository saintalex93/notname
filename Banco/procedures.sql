-- call USP_LOGIN('gabriela', '123');

-- 


use notnamec_db;

-- Reformar essa merda 

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








