<?php
require_once '../dal/MarcaDAL.php';


$putinhaloira = MarcaDAL::buscaMarca();

foreach ($putinhaloira as $p) {
    // echo "Codigo da Marca: " + $p->getIdMarca()+"<br/>";
    // echo "Nome da Marca: "+ $p->getDescMarca()+"<br/>";
    echo "Codigo da Marca: " . $p->getIdMarca() . "<br />";
    echo "Nome da Marca: " . $p->getDescMarca() . "<br />";
    echo "Status da Marca: " . $p->getStatusMarca() . "<br />";
}


?>