<?php
require_once '../model/Cliente.php';
require_once '../library/Conexao.class.php';

class ClienteDAL
{

    /**
     *
     * @var Database
     */
    private static $connection = null;

    private static function connect()
    {
        if (is_null(ClienteDAL::$connection)) {
            ClienteDAL::$connection = new Database();
        }
    }

    /**
     *
     * @return bool Essa funcao ira fazer a insercao do cliente no sistema.
     */
    public static function insereCliente(Cliente $cliente): string
    {
        
        // Nova instancia do banco de dados.
        ClienteDAL::connect();
        
        $nome = $cliente->getNomeCli();
        $email = $cliente->getEmailCli();
        $login = $cliente->getLoginCli();
        $senha = $cliente->getSenhaCli();
        $status = $cliente->getStatusCli();
        
        $sql = "INSERT INTO CLIENTE (CLI_cNOME,CLI_cEMAIL,CLI_cLOGIN,CLI_cSENHA,CLI_cSTATUS)
        VALUES ('$nome','$email','$login','$senha','$status')";
        
        // Executa a string sql
        return ClienteDAL::$connection->executarSQL($sql);
    }

    public static function buscaCliente(): array
    {
        $sql = "";
        
        ClienteDAL::connect();
        
        // Executa a string sql e atribui a uma variavel
        ClienteDAL::$connection->executarSQL($sql);
        
        $resultado = ClienteDAL::$connection->getResultados();
        
        $arrayCli = array();
        
        foreach ($resultado as $resultado) {
            // Instancia a classe cliente.
            $resultCli = new Cliente();
            // Seta os valores do resultado.
            $resultCli->setIdCli($resultado['CLI_nID']);
            $resultCli->setNomeCli($resultado['CLI_cNOME']);
            $resultCli->setCpfCli($resultado['CLI_nCPF']);
            $resultCli->setRgCli($resultado['CLI_cRG']);
            $resultCli->setNascCli($resultado['CLI_dDTNASC']);
            $resultCli->setGeneroCli($resultado['CLI_cGENERO']);
            $resultCli->setTelResiCli($resultado['CLI_nTRESIDENCIAL']);
            $resultCli->setTelCelCli($resultado['CLI_nTCELULAR']);
            $resultCli->setTelComCli($resultado['CLI_nTCOMERCIAL']);
            $resultCli->setEmailCli($resultado['CLI_cEMAIL']);
            $resultCli->setLoginCli($resultado['CLI_cLOGIN']);
            $resultCli->setSenhaCli($resultado['CLI_cSENHA']);
            $resultCli->setDtUltAccessCli($resultado['CLI_dDTULTIMO_ACESSO']);
            $resultCli->setStatusCli($resultado['CLI_cSTATUS']);
            $resultCli->setPrefCli($resultado['CLI_tPREFERENCIA']);
            
            // atribui todas as informacoes ao array
            $arrayCli[] = $resultCli;
        }
        return $arrayCli;
    }

    public static function atualizaCliente(Cliente $cliente): string
    {
        ClienteDAL::connect();
        
        $id = $cliente->getIdCli();
        
        $sql = "";
        
        return ClienteDAL::$connection->executarSQL($sql);
    }

    public static function atualizaUltimoAcessoCliente(Cliente $cliente): string
    {
        ClienteDAL::connect();
        
        $id = $cliente->getIdCli();
        
        $sql = "";
        
        return $connection->executarSQL($sql);
    }
}
