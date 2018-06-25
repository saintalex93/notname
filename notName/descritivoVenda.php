<?php
if (isset($_SESSION['TOTAL_VENDA'])) {
    $totalVenda = $_SESSION['TOTAL_VENDA'];
} else {
    echo "<script>window.location.href='carrinho.php'</script>";
}


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
                    <th><?php echo $totalVenda; ?></th>
                </tr>
                <br>
                <tr>
                    <td>Envio</td>
                    <th>R$0.00</th>
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