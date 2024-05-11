<?php
require_once ('models/Product.php');

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


    public function add()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['idProduct'])) {
                $id_product = $_POST['idProduct'];

                if(!isset($_SESSION['carrito'])){
                    $_SESSION['carrito'] = array();
                }

                // segundo array carrito que cuenta productos incluso duplicados(usado para mostra cantidad de prodcutos en el logo del carrito)
                if(!isset($_SESSION['carrito_total'])){
                    $_SESSION['carrito_total'] = array();
                }

                if (isset($_SESSION['carrito'])) {

                    $counter = 0;
                    $counter_total_products = 0;
                    foreach ($_SESSION['carrito'] as $key => $product) {
                        if ($product['id'] == $id_product) {
                            $_SESSION['carrito'][$key]['stock']++;
                            $counter++;
                        }                        
                    }


                    if ($counter == 0) {
                        $_SESSION['carrito'];

                        $product = new Product();
                        $product->setId($id_product);
                        $producto = $product->getOne($id_product);

                        $_SESSION['carrito'][] = array(
                            'id' => $producto->id,
                            'name' => $producto->name,
                            'desc' => $producto->description,
                            'price' => $producto->price,
                            'stock' => 1
                        );
                    }

                    $_SESSION['carrito_total'][] = $id_product;

                    header('Location: index.php?class=product&method=index');
                }
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