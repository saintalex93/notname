<?php
if (isset($_SESSION['TOTAL_VENDA'])) {
    $totalVenda = $_SESSION['TOTAL_VENDA'];
    $subTotal = $totalVenda;


    if(isset($_SESSION['FRETE'])){
        $frete = "R$ ". number_format($_SESSION['FRETE'],2,',','.');

        $Vfrete = $frete;
        $Vfrete = str_replace(".", "", $Vfrete);
        $Vfrete = str_replace("R$ ", "", $Vfrete);
        $Vfrete = str_replace(",", ".", $Vfrete);

        $vTotalVenda = $totalVenda;
        $vTotalVenda = str_replace(".", "", $vTotalVenda);
        $vTotalVenda = str_replace("R$ ", "", $vTotalVenda);
        $vTotalVenda = str_replace(",", ".", $vTotalVenda);

        $totalVenda = $vTotalVenda + $Vfrete;
        $totalVenda = "R$ ".number_format($totalVenda,2,',','.');

    }
    else{
        $frete = "R$0.00";
    }

} else {
    echo "<script>window.location.href='carrinho.php'</script>";
}

// $total = $frete + $totalVenda;


?>


<div class="card">
    <div class="card-header">
        <h3 class="mx-3">Resumo do pedido</h3>
    </div>
    <br>
    <p class="text-muted text-center">Envio e custos adicionais são calculados com base nos valores que você inseriu.</p>

    <div class="table-responsive ">
        <table class="table text-center">
            <tbody>
                <tr>
                    <td>Subtotal</td>
                    <th><?php echo $subTotal; ?></th>
                </tr>
                <br>
                <tr>
                    <td>Envio</td>
                    <th><?php echo $frete;?></th>
                </tr>
                <tr>
                    <td>Imposto</td>
                    <th>R$0.00</th>
                </tr>
                <tr class="total">
                    <td>Total</td>
                    <th><?php echo $totalVenda; ?></th>
                </tr>
            </tbody>
        </table>
    </div>

</div>