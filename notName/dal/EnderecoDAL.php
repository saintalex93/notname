<?php
require_once "../model/Endereco.php";
require_once "../library/Conexao.class.php";

class EnderecoDAL
{

    public static function insereEndereco(Endereco $end): string
    {
        $connection = new Database();
        
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
        $connection->executarSQL($sql);
        
        // Pega o ultimo id
        $idEnd = $connection->insert_id;
        
        // Seta o id do endereco
        $end->setId($idEnd);
    }

    public static function buscaEndereco(Endereco $end): array
    {
        // abre uma nova instancia da classe Database()
        $connection = new Database();
        
        // String sql
        $sql = "";
        
        // Executa a string sql e atribui a variavel
        $resultado = $connection->executarSQL($sql);
        
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
        $connection = new Database();
        
        $idEnd = $end->getId();
        
        $sql = "";
        
        return $connection->executarSQL($sql);
        
        
        
    }
}