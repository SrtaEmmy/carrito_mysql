<?php 
 
class Product{
    public $id;
    public $name;
    public $price;
    public $description;
    public $stock;
    public $db;

    public function __construct(){
        $this->db = Database::connect();
    }





    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getName()
    {
        return $this->name;
    }

 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    public function getPrice()
    {
        return $this->price;
    }


    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }


    public function getDescription()
    {
        return $this->description;
    }

 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }


    public function getStock()
    {
        return $this->stock;
    }


    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }



    public function getAll(){
        session_start();
        $sql = "SELECT * FROM products";
        $result = $this->db->query($sql);

        $products = [];
        if($result->num_rows > 0){
            while ($row = $result->fetch_object()) { 
            $product = new Product();
              $product->setId($row->id);
              $product->setName($row->name);
              $product->setPrice($row->price);
              $product->setDescription($row->description);
              $product->setStock($row->stock);

              $products[] = $product;
            }
            return $products;
        }else{
            $result = false;
            return $result;
        }
    }
    


    public function getOne($id){
        $sql = "SELECT * FROM products WHERE id = '$id'";
        $result = $this->db->query($sql);

        return $result->fetch_object();
    }






}  
 
 
?>