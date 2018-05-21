<?php
require_once '../library/Conexao.class.php';

class Instancias
{
    /**
     * 
     * @var Database
     */
    
    private $database = null;
    
    public static function newDatabase()
    {
        if (is_null($this->database)){
            $this->database = new Database();
        }
    }
    
}