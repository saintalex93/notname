<?php

class Database
{

    // Vari�vel de resultado do sql.
    private $resutado;

    /**
     *
     * @var PDO
     */
    private $connection;

    public function conectar()
    {
        try {
            $srtDeConexao = "mysql:host=192.185.176.119;dbname=notnamec_db;";
            
            $arrConfig = array(
                // Configura o comando de inicialização. - set names = Comando mysql
                PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"
            );
            $this->connection = new PDO($srtDeConexao, "notnamec_usr", "hds24@carol", $arrConfig);
            
            // Modo de erro: Só avisa quando fodeu.
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
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

    public function executarSQL(string $sql)
    {
        
        // Conecta no banco
        $this->conectar();
        
        // Limpando a variavel resultado.
        $this->resutado = null;
        
        // Tratamento de erro
        try {
            // Inicia Tran��o
            $this->connection->beginTransaction();
            
            // Prepara o banco para receber a string sql.
            $this->resutado = $this->connection->prepare($sql);
            
            // Executa a string sql.
            $this->resutado->execute();
        } catch (Exception $e) {
            // Rollback � excutado em caso de erro.
            $this->connection->rollBack();
            return FALSE;
        }
        
        // Se n�o houver erro executa o commit
        $this->connection->commit();
        
        // Fecha a conexao.
        $this->fecharConexao();
        
        return TRUE;
    }
    
    public function executeSQLwithoutTransaction(string $sql){
        
        $this->conectar();
        
        $this->resutado = null;
        
        try{
            
            $this->resutado = $this->connection->prepare($sql);
            
            $this->resutado->execute();
        }catch (Exception $e){
            
            return false;
        }
        
    }

    public function executaProcedure(string $sql)
    {
        
        // Conecta no banco
        $this->conectar();
        
        // Limpando a variavel resultado.
        $this->resutado = null;
        
        // Tratamento de erro
        try {
            $this->resutado = $this->connection->prepare($sql);
            
            // Executa a string sql.
            $this->resutado->execute();
        } catch (Exception $e) {
            return FALSE;
        }
        // Fecha a conexao.
        $this->fecharConexao();
        
        return TRUE;
    }

    public function getResultados(): array
    {
        return $this->resutado->fetchAll();
    }

    public function returnID()
    {
        $lastid = $this->connection->lastInsertId();
        $this->fecharConexao();
        
        return $lastid;
        
    }
}
   
