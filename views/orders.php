<h1>Confirmar pedido</h1>

<p>Total: <?php echo $total_price ?></p>
<form action="index.php?class=order&method=confirm" method="post">
    <input type="submit" value="CONFIRMAR" class="btn btn-dark m-4">
</form>

<br><br><br><br><br>

<a class="btn btn-bg" href="index.php?class=carrito&method=index">Ver carrito</a>
