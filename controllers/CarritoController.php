<?php
require_once ('models/Product.php');
require_once('models/Carrito.php');

class CarritoController
{
    public function index()
    {
        session_start();
        if(!isset($_SESSION['carrito'])){
            $_SESSION['carrito'] = array();
        }

        if(!isset($_SESSION['carrito_total'])){
            $_SESSION['carrito_total'] = array();
        }


        require_once ('views/carrito.php');
    }


    public function add(){
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['idProduct'])) {

                $carrito = new Carrito();
                $carrito->setId_product($_POST['idProduct']);

                $carrito->addCarrito();

                header('Location: index.php?class=product&method=index');
            }
        }
    }




    public function remove()
    {
        echo "removiendo producto del carrito";
    }
    

    public function delete_all()
    {
        unset($_SESSION['carrito']);
        unset($_SESSION['carrito_total']);
        header('index.php?class=carrito&method=index');
    }
}


?>
