<?php 
 
class Order{
    
    private $id;
    private $user_id;
    private $province;
    private $locality;
    private $price;
    private $db;

    /* simulacion de datos del usuario. 
    En el proyecto completo lo recuperaría de la bbdd*/
    public function __construct(){
        $this->id = 1;
        $this->user_id = 7;
        $this->province = 'Madrid';
        $this->locality = 'Fuenlabrada';

        $this->db = Database::connect();
    }

 
    public function getId()
    {
        return $this->id;
    }

 
    public function getUser_id()
    {
        return $this->user_id;
    }

 
    public function getProvince()
    {
        return $this->province;
    }

    public function getLocality()
    {
        return $this->locality;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }


    public function save(){
        $saved = false;

        $sql = "INSERT INTO orders VALUES(NULL, '{$this->getUser_id()}', '{$this->getProvince()}', '{$this->getLocality()}', '{$this->getPrice()}')";
        $saving = $this->db->query($sql);

        if($saving){
            $saved = true;
        }

        return $saved;
    }


    public function decrease_stock(){
        @session_start();

        if(!empty($_SESSION['carrito'])){
            foreach ($_SESSION['carrito'] as $product) {
                $id_product = $product['id'];
                $amount_stock_decrease = $product['stock'];

                echo "ID: $id_product </br> DISMINUIR: $amount_stock_decrease </br> </br>";
            
                $sql = "update products set stock = stock - '{$amount_stock_decrease}' where id = '{$id_product}'";
                $this->db->query($sql);
            }
        }
    }




}  
 
 
?>