<?php
require_once '../model/Cliente.php';
require_once '../library/Conexao.class.php';
require_once '../model/Endereco.php';

class ClienteDAL
{

    /**
     *
     * @return bool Essa função ira fazer a inserção do cliente no sistema.
     */
    public static function insereCliente(Cliente $cliente): string
    {
        
        // Nova instancia do banco de dados.
        $connection = new Database();
                
        $nome = $cliente->getNomeCli($_GET['nome']);
        $rg = $cliente->getRgCli($_GET['rg']);
        $cpf = $cliente->getCpfCli($_GET['cpf']);
        $nasc = $cliente->getNascCli($_GET['nasc']);
        $genero = $cliente->getGeneroCli($_GET['gen']);
        $telRes = $cliente->getTelResiCli($_GET['telres']);
        $telCel = $cliente->getTelCelCli($_GET['telcel']);
        $telCom = $cliente->getTelComCli($_GET['telcom']);
        $email = $cliente->getEmailCli($_GET['email']);
        $login = $cliente->getLoginCli($_GET['login']);
        $senha = $cliente->getSenhaCli($_GET['senha']);
        $status = $cliente->getStatusCli($_GET['status']);
        $preferenciaSys = $cliente->getPrefCli($_GET['prefsys']);
        
        //http://localhost/notname/notName/dal/ClienteDAL.php?nome=assss&rg=358772205&cpf=41203647808&nasc=1994-03-04&gen=m&telres=1139453415&telcel=11982524613&telcom=&email=sksdgkas@ksoakga.com&login=joaquim&senha=joaquina&status=0&prefsys=
        
        $sql = "INSERT INTO CLIENTE (CLI_cNOME,CLI_cRG,CLI_nCPF,CLI_dDTNASC,CLI_cGENERO,CLI_nTRESIDENCIAL,CLI_cEMAIL,CLI_cLOGIN,CLI_cSENHA,CLI_cSTATUS)
VALUES ('$nome','$rg','$cpf','$nasc','$genero','$telRes','$email','$login','$senha','$status')";
        
        return $connection->executarSQL($sql);
    }
}