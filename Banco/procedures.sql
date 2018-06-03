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
create function buscaDescCategoriaPai(idCatPai int)
returns varchar(50)
begin
declare nomeCategoria varchar(50);
select CATEGORIA_cDESC into nomeCategoria
from CATEGORIA
where CATEGORIA_nID = idCatPai;
return nomeCategoria;
end $$
DELIMITER ;

