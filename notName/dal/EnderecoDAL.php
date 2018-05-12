<?php
require_once "../model/Endereco.php";
require_once "../library/Conexao.class.php";

class EnderecoDAL
{

    /**
     *
     * @var Database
     */
    private static $connection = null;

    private static function connect()
    {
        if (is_null(EnderecoDAL::$connection)) {
            EnderecoDAL::$connection = new Database();
        }
    }

    public static function insereEndereco(Endereco $end): string
    {
        EnderecoDAL::connect();
        
        // pega as informacoes e atribui as variaves
        $cep = $end->getCep();
        $logradouro = $end->getLogradouro();
        $cidade = $end->getCidade();
        $bairro = $end->getBairro();
        $numero = $end->getNumero();
        $complemento = $end->getComplemento();
        $tipo = $end->getTipo();
        $uf = $end->getUF();
        
        // recebe a string sql
        $sql = "";
        
        // Executa a string sql
        EnderecoDAL::$connection->executarSQL($sql);
        
        return EnderecoDAL::$connection->returnID();
    }

    public static function buscaEndereco(Endereco $end): array
    {
        EnderecoDAL::connect();
        
        // String sql
        $sql = "";
        
        // Executa a string sql e atribui a variavel
        $resultado = EnderecoDAL::$connection->executarSQL($sql);
        
        // criar uma variavel globa do tipo array
        $arrayEnd = array();
        
        foreach ($resultado as $resultado) {
            
            // instancia a classe endereco
            $resultEnd = new Endereco();
            
            // Seta os valores do resultado
            $resultEnd->setCep($resultado['END_nCEP']);
            $resultEnd->setLogradouro($resultado['END_cLOGRADOURO']);
            $resultEnd->setCidade($resultado['END_cCIDADE']);
            $resultEnd->setBairro($resultado['END_cBAIRRO']);
            $resultEnd->setNumero($resultado['END_nNUMERO']);
            $resultEnd->setComplemento($resultado['END_cCOMPLEMENTO']);
            $resultEnd->setTipo($resultado['END_cTIPO']);
            
            // atribui os valores do resultado do select no array
            $arrayEnd[] = $resultEnd;
        }
        
        // Retorna o array com todas as informacoes.
        return $arrayEnd;
    }

    public static function atualizaEndereco(Endereco $end): string
    {
        EnderecoDAL::connect();
        
        $idEnd = $end->getId();
        
        $sql = "";
        
        return EnderecoDAL::$connection->executarSQL($sql);
    }

    public static function buscaUF(Endereco $end): string
    {
        EnderecoDAL::connect();
        
        $idUF = $end->getIdUF();
        $UF = $end->getUF();
        
        $sql = "";
        
        $resultado = EnderecoDAL::$connection->executarSQL($sql);
        
        $arrayUF = array();
        
        foreach ($resultado as $resultado) {
            
            $resultadoUF = new Endereco();
            
            $resultadoUF->setUFid($resultado['UF_nID']);
            $resultadoUF->setUF($resultado['UF_cUF']);
            
            $arrayUF[] = $resultadoUF;
        }
        
        return $arrayUF;
    }
}