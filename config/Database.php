<?php 
 
class Database{
   public static function connect(){
    $connection = new mysqli('localhost', 'root', '', 'tienda');
    $connection->query("SET NAMES 'utf8'");
    return $connection;
   }    
}  
 
 
?>