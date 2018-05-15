<?php
require_once '../dal/MarcaDAL.php';

$putinhaloira = MarcaDAL::buscaMarca();

echo $putinhaloira;

?>