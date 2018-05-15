<?php

class Database
{

   
    // Vari�vel de resultado do sql.
    private $resutado;

    private $connection;
    
    public function conexao()
    {
        try {
            $srtDeConexao = "mysql:host=192.185.176.119;dbname=notnamec_db;";
            
            $arrConfig = array(
                // Configura o comando de inicialização. - set names = Comando mysql
                PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"
            );
            $this->conexao = new PDO($srtDeConexao, "notnamec_usr", "hds24@carol", $arrConfig);
            // Modo de erro: Só avisa quando fodeu.
            // $this->conexao->setAttribute(PDO::ATTR_ERRMODE, $value);
        } catch (Exception $e) {
            
            // Comentar essa linha para produção;
            echo $e->getMessage();
            // Return para o Sistema operacional Windão
            exit(1);
        }
    }
    public function fecharConexao()
    {
        $this->connection = null;
    }
  

    public function executarSQL(string $sql): bool
    {
        
        // Conecta no banco
        $this->conexao();
        
        // Limpando a variavel resultado.
        $this->resutado = null;
        
        // Tratamento de erro
        try {
            // Inicia Tran��o
            $this->conexao()->beginTransaction();
            
            // Prepara o banco para receber a string sql.
            $this->resutado = $this->conexao()->prepare($sql);
            
            // Executa a string sql.
            $this->resutado->execute();
        } catch (Exception $e) {
            // Rollback � excutado em caso de erro.
            $this->conexao()->rollBack();
            return FALSE;
        }
        
        // Se n�o houver erro executa o commit
        $this->conexao()->commit();
        
        // Fecha a conexao.
        $this->fecharConexao();
        
        return TRUE;
    }

    public static function getResultados(): array
    {
        return $this->resutado->fetchAll();
    }
    
    public static function returnID() : int
    {
        
     return $this->connection->lastInsertId();
     
        
    }
}