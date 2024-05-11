<?php
require_once ('models/Order.php');

class OrderController
{
    public function orderProduct()
    {
        session_start();
      $total_price = Helpers::get_total_price();

        require_once ('views/orders.php');
    }


    public function confirm()
    {
        session_start();
        $total_price = Helpers::get_total_price();

        if ($total_price > 0) {

            $order = new Order();
            $order->setPrice($total_price);
            //aqui habría más setters si los datos del usuario no fueran una simulación

            $save = $order->save();

            if ($save) {
                $_SESSION['order'] = 'complete';

                $order->decrease_stock();
                
                
                unset($_SESSION['carrito']);
                unset($_SESSION['carrito_total']);
                
                
                
                header('Location: index.php?class=confirm&method=index');
            }
        }
        
    }
    

}


?>