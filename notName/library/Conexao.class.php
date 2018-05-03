<?php

/**
 * Classe de conexão ao banco de dados usando PDO no padr�o Singleton.
 * Modo de Usar:
 * require_once './Database.class.php';
 * $db = Database::conexao();
 * E agora use as fun��es do PDO (prepare, query, exec) em cima da vari�vel $db.
 */
class Database
{

    // Vari�vel que guarda a conex�o PDO.
    protected static $db;

    // Vari�vel de resultado do sql.
    private $resutado;

    // Private construct - garante que a classe possa ser instanciada internamente.
    private function __construct()
    {
        // Informa��ees sobre o banco de dados:
        $db_host = "192.185.176.119";
        $db_nome = "notnamec_db";
        $db_usuario = "notnamec_usr";
        $db_senha = "hds24@carol";
        $db_driver = "mysql";
        
        // Informa��ees sobre o sistema:
        $sistema_titulo = "Notname";
        $sistema_email = "gabibransford@icloud.com";
        
        try {
            // Atribui o objeto PDO a vari�vel $db.
            self::$db = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
            // Garante que o PDO lance exce��es durante erros.
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Garante que os dados sejam armazenados com codifica��o UFT-8.
            self::$db->exec('SET NAMES utf8');
        } catch (PDOException $e) {
            // Envia um e-mail para o e-mail oficial do sistema, em caso de erro de conex�o.
            mail($sistema_email, "PDOException em $sistema_titulo", $e->getMessage());
            // Ent�o n�o carrega nada mais da p�gina.
            die("Connection Error: " . $e->getMessage());
        }
    }

    // M�todo est�tico - acess�vel sem instancia��o.
    public static function conexao()
    {
        // Garante uma �nica inst�ncia. Se n�o existe uma conex�o, criamos uma nova.
        if (! self::$db) {
           self::$db = new Database();
        }
        
        // Retorna a conex�o.
        return self::$db;
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
        $this->fechaConexao();
        
        return TRUE;
    }

    public static function getResultados(): array
    {
        return $this->resutado->fetchAll();
    }
}