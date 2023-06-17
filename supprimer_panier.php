<?php
session_start();
include_once "connexion.php";


$idhistorique=$_GET['histo'];
if(isset($_GET['id']) && isset($_GET['histo'])){
    $_SESSION['num_prod']--;

    $query = 'DELETE FROM historique_des_achats WHERE id_historique=' .$idhistorique;
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo'<script> alert(supprimé avec succés)</script>';
    header("Location:panier.php");
	 






}
?>