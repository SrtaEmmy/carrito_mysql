<?php

class Helpers
{

    public static function get_total_price(){
        $total = 0;

        if(isset($_SESSION['carrito'])){

            foreach ($_SESSION['carrito'] as $product) {
                $total += $product['price']*$product['stock'];
            }
        }

        return $total;
    }

}

?>