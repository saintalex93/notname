<?php

/**
 * Classe de conexÃ£o ao banco de dados usando PDO no padrão Singleton.
 * Modo de Usar:
 * require_once './Database.class.php';
 * $db = Database::conexao();
 * E agora use as funções do PDO (prepare, query, exec) em cima da variável $db.
 */
class Database
{

    // Variável que guarda a conexão PDO.
    protected static $db;

    // Variável de resultado do sql.
    private $resutado;

    // Private construct - garante que a classe possa ser instanciada internamente.
    private function __construct()
    {
        // Informaçõees sobre o banco de dados:
        $db_host = "192.185.176.119";
        $db_nome = "notnamec_db";
        $db_usuario = "notnamec_usr";
        $db_senha = "hds24@carol";
        $db_driver = "mysql";
        
        // Informaçõees sobre o sistema:
        $sistema_titulo = "Notname";
        $sistema_email = "gabibransford@icloud.com";
        
        try {
            // Atribui o objeto PDO a variável $db.
            self::$db = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
            // Garante que o PDO lance exceções durante erros.
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Garante que os dados sejam armazenados com codificação UFT-8.
            self::$db->exec('SET NAMES utf8');
        } catch (PDOException $e) {
            // Envia um e-mail para o e-mail oficial do sistema, em caso de erro de conexão.
            mail($sistema_email, "PDOException em $sistema_titulo", $e->getMessage());
            // Então não carrega nada mais da página.
            die("Connection Error: " . $e->getMessage());
        }
    }

    // Método estático - acessível sem instanciação.
    public static function conexao()
    {
        // Garante uma única instância. Se não existe uma conexão, criamos uma nova.
        if (! self::$db) {
            new Database();
        }
        
        // Retorna a conexão.
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
            // Inicia Tranção
            $this->conexao()->beginTransaction();
            
            // Prepara o banco para receber a string sql.
            $this->resutado = $this->conexao()->prepare($sql);
            
            // Executa a string sql.
            $this->resutado->execute();
        } catch (Exception $e) {
            // Rollback é excutado em caso de erro.
            $this->conexao()->rollBack();
            return FALSE;
        }
        
        // Se não houver erro executa o commit
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