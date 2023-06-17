<?php
 //connexion à la base de données
 $conn=mysqli_connect("localhost","root","","database");
 //verifier la connexion
 if(!$conn) die('Erreur :'.mysqli_connect_error());
 


?>