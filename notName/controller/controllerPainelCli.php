<?php
require_once __DIR__ . "/../dal/ClienteDAL.php";
require_once __DIR__ . "/../dal/EnderecoDAL.php";

if($_REQUEST['action'] == 'alteraDadoscli'){

echo "Cliente";

}
elseif ($_REQUEST['action'] == 'alteraEndcli') {

echo "Endereço";

}
elseif ($_REQUEST['action'] == 'alteraSenhacli') {

    echo "Senha";

}

?>