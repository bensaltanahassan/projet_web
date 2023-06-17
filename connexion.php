<?php
   try{
      $pdo=new PDO("mysql:host=localhost;dbname=database","root","");
   }
   catch(PDOException $e){
      echo $e->getMessage();
      
   }
?>
