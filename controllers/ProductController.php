<?php 
require_once('models/Product.php');
 
class ProductController{
    public function index(){
    
        $product = new Product();
        $products = $product->getAll();
        
        require_once('views/productos.php');
    }
    
}  
 
 
?>