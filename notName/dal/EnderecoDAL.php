<?php
require_once "../model/Endereco.php";
require_once "../library/Conexao.class.php";

class EnderecoDAL extends Cliente
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
        $sql = "INSERT INTO ENDERECO (END_nCEP, END_cLOGRADOURO, END_cCIDADE, END_cBAIRRO,END_nNUMERO,END_cCOMPLEMENTO,END_cTIPO,UF_nID)
                            VALUES ('$cep','$logradouro','$cidade','$bairro','$numero','$complemento','$tipo','$uf')";
        
        // Executa a string sql
        EnderecoDAL::$connection->sqlNoTransact($sql);
        
        return EnderecoDAL::$connection->returnID();
    }

    public static function buscaEndereco(Endereco $end): array
    {
        EnderecoDAL::connect();
        $cliente = new Cliente;

        $id = $cliente->getIdCli;

        // String sql
        $sql = "SELECT * FROM ENDERECO E INNER JOIN CLIENTE_ENDERECO CE ON CE.END_nID = E.END_nID WHERE CLI_nCOD = $id";
        
        // Executa a string sql e atribui a variavel
        EnderecoDAL::$connection->executarSQL($sql);
        
        // Pega os resultados
        $resultado = EnderecoDAL::$connection->getResultados();
        
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
        $cep = $end->getCep();
        $logradouro = $end->getLogradouro();
        $cidade = $end->getCidade();
        $bairro = $end->getBairro();
        $numero = $end->getNumero();
        $complemento = $end->getComplemento();
        $tipoEnd = $end->getTipo();
        $idUf = $end->getId();
        
        $sql = "UPDATE ENDERECO SET END_nCEP = '$cep', END_cLOGRADOURO = '$logradouro', END_cCIDADE = '$cidade', 
                                    END_cBAIRRO = '$bairro', END_nNUMERO = '$numero', END_cCOMPLEMENTO = '$complemento', 
                                    END_cTIPO = '$tipoEnd', UF_nID = '$idUf' WHERE END_nID = $idEnd ";
        
        return EnderecoDAL::$connection->executarSQL($sql);
    }

    public static function buscaUF(Endereco $end): string
    {
        EnderecoDAL::connect();
              
        $sql = "SELECT * FROM UF";
        
        EnderecoDAL::$connection->executarSQL($sql);
        
        $resultado = EnderecoDAL::$connection->getResultados();
        
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