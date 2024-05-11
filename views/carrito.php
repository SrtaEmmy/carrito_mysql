<?php
if(isset($_SESSION['carrito'])){
    $carrito = $_SESSION['carrito'];
}
$total_price = Helpers::get_total_price() ?>


        <h1>Carrito</h1>

        
        <?php if(isset($carrito) && count($carrito) > 0): ?>
        <?php foreach ($carrito as $product): ?>
            <div class="col-md-6">

                <div class="card m-1 " style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name']; ?></h5>
                        <p class="card-text"><?php echo $product['desc'] ?></p>
                        
                        <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo $product['price'] ?> €</h6>
                        
                        <p class="card-text">cantidad: <b><?php echo $product['stock'] ?></b></p>
                    </div>
                </div>
            </div>
            <?php endforeach ?>

            <h2>Total: <?php echo $total_price ?></h2>
            <a href="index.php?class=order&method=orderProduct" class="btn btn-dark m-4">PAGAR</a> <br><br><br>
            <a href="index.php?class=product&method=index" class="btn btn-bg">Volver a Tienda</a>
            
        <?php else: ?>
            <div class="centrado">
                <div>
                    <p class="big" >El carrito está vacío</p> 
                    <a href="index.php?class=product&method=index" class="btn btn-bg" >Volver a Tienda</a>
                </div>
            </div>
        <?php endif ?>
