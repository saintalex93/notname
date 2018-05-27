<?php

require_once '../dal/CategoriaDAL.php';


$putinhaloira = CategoriaDAL::buscaCategoria();

var_dump($putinhaloira);
?>