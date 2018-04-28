<?php
require_once '../model/Cliente.php';
require_once '../library/Conexao.class.php';


class ClienteDAL
{
    
    /**
     *
     * @return bool Essa funcao ira fazer a insercao do cliente no sistema.
     */
       
    public static function insereCliente(Cliente $cliente): string
    {
        
        // Nova instancia do banco de dados.
        $connection = new Database();
        
        
        $nome = $cliente->getNomeCli();
        $rg = $cliente->getRgCli();
        $cpf = $cliente->getCpfCli();
        $nasc = $cliente->getNascCli();
        $genero = $cliente->getGeneroCli();
        $telRes = $cliente->getTelResiCli();
        $telCel = $cliente->getTelCelCli();
        $telCom = $cliente->getTelComCli();
        $email = $cliente->getEmailCli();
        $login = $cliente->getLoginCli();
        $senha = $cliente->getSenhaCli();
        $status = $cliente->getStatusCli();
        $preferenciaSys = $cliente->getPrefCli();
        
        // http://localhost/notname/notName/dal/ClienteDAL.php?nome=assss&rg=358772205&cpf=41203647808&nasc=1994-03-04&gen=m&telres=1139453415&telcel=11982524613&telcom=&email=sksdgkas@ksoakga.com&login=joaquim&senha=joaquina&status=0&prefsys=
        
        $sql = "INSERT INTO CLIENTE (CLI_cNOME,CLI_cRG,CLI_nCPF,CLI_dDTNASC,CLI_cGENERO,CLI_nTRESIDENCIAL,
        CLI_cEMAIL,CLI_cLOGIN,CLI_cSENHA,CLI_cSTATUS)
        VALUES ('$nome','$rg','$cpf','$nasc','$genero','$telRes','$email','$login','$senha','$status')";
        
        // Executa a string sql
        $connection->executarSQL($sql);
        
        // Recupera o ultimo id inserido
        $idCli = $connection->insert_id;
        
        //seta o id do cliente;
        $cliente->setIdCli($idCli);
        
    }

    public static function buscaCliente(): array
    {
        $sql = "";
        
        $connection = new Database();
        
        // Executa a string sql e atribui a uma variavel
        $resultado = $connection->executarSQL($sql);
        
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
            
            //atribui todas as informacoes ao array
            $arrayCli[] = $resultCli;
        }
        return $arrayCli;
    }

    public static function atualizaCliente(Cliente $cliente): string
    {
        
        
        $connection = new Database();
        
        $id = $cliente->getIdCli();
        
        $sql = "";
        
        return $connection->executarSQL($sql);
    }

    public static function atualizaUltimoAcessoCliente(Cliente $cliente): string
    {

        $connection = new Database();
        
        $id = $cliente->getIdCli();
        
        $sql = "";
        
        return $connection->executarSQL($sql);
    }
}
