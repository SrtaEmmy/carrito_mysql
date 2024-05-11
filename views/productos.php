
    <h1>Productos</h1>

    <a href="index.php?class=carrito&method=index" class="btn mb-4 btn-dark">
        <i class="bi bi-cart4 text-light"></i>    
        
        <?php if(!empty($_SESSION['carrito_total'])): ?>
              <?php echo count($_SESSION['carrito_total']) ;?>
        <?php else: ?>
            0
        <?php endif ?>
    </a>

    <div class="row">

        <?php if ($products):
            foreach ($products as $product): ?>
                <div class="col-md-6">

                    <div class="card m-4 card-product " style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product->name; ?></h5>
                            <p class="card-text"><?php echo $product->description ?></p>

                            <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo $product->price ?> €</h6> 
                            <span class="<?php echo $product->stock>10 ? 'text-success' : 'text-danger' ?>" >
                            Cantidad en stock: <?php echo $product->stock ?>
                            </span>
                            
                            <form action="index.php?class=carrito&method=add" method="post">
                                <input type="hidden" name="idProduct" value="<?php echo $product->id ?>">
                                <button type="submit" class="btn btn-lg"><i class="bi bi-cart4 text-light"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

            <?php endforeach;
         else: ?>
            <p>No hay productos</p>
        <?php endif ?>


    </div>