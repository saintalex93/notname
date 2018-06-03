<?php
require_once __DIR__ . '/../model/Tamanho.php';
require_once __DIR__ . '/../library/Conexao.class.php';

class TamanhoDAL
{

    /**
     *
     * @var Database
     */
    private static $connection = null;

    private static function connect()
    {
        if (is_null(TamanhoDAL::$connection)) {
            TamanhoDAL::$connection = new Database();
        }
    }

    public static function insereTamanho(Tamanho $tamanho): string
    {
        TamanhoDAL::connect();
        
        $siglaTamanho = $tamanho->getSiglaTamanho();
        $descTamanho = $tamanho->getDescTamanho();
        
        $sql = "INSERT INTO TAMANHO VALUES (0, '$siglaTamanho', '$descTamanho')";
        return TamanhoDAL::$connection->executarSQL($sql);
    }

    public static function alteraTamanho(Tamanho $Tamanho): string
    {
        TamanhoDAL::connect();
        $idTamanho = $Tamanho->getIdTamanho();
        $siglaTamanho = $tamanho->getSiglaTamanho();
        $descTamanho = $Tamanho->getDescTamanho();
        
        $sql = "";
        
        return TamanhoDAL::$connection->executarSQL($sql);
    }

    public static function buscaTamanho(): array
    {
        TamanhoDAL::connect();
        
        $sql = "SELECT * FROM TAMANHO";
        
        TamanhoDAL::$connection->executarSQL($sql);
        
        $resultados = TamanhoDAL::$connection->getResultados();
        
        $arrayTamanho = array();
        
        foreach ($resultados as $resultado) {
            $Tamanho = new Tamanho();
            
            $id = $resultado['TAMANHO_nID'];
            $sigla = $resultado['TAMANHO_cTAMANHO'];
            $descricao = $resultado['TAMANHO_cDESC'];
            
            $Tamanho->setIdTamanho($id);
            $Tamanho->setSiglaTamanho($siglaTamanho);
            $Tamanho->setDescTamanho($descricao);
            
            $arrayTamanho[] = $Tamanho;
        }
        return $arrayTamanho;
    }
}
