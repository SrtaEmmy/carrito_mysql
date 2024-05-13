<?php 
require_once('models/Product.php');
 
class Carrito{
    
    public $id_product;

    
 
    public function getId_product()
    {
        return $this->id_product;
    }


    public function setId_product($id_product)
    {
        $this->id_product = $id_product;

        return $this;
    }



    public function addCarrito(){

        $id_product = $this->getId_product();

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


        }
    }
}  
 
 
?>
