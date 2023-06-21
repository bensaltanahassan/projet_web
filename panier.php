<!DOCTYPE html>
  <html lang="en">
    <head>
    <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>shop</title>
     <link rel="stylesheet" href="style.css">
     <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"> -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
     <style>
        body{
            background-color:whitesmoke;
        }
        tr,td,th{
            border:1px solid black;
        }
        th{
            background-color:#ebebeb;
        }
        table{
            width:80%;
        }
        .container-fluid {
  background-color: #252525;
  position:fixed;
}
.navbar-header {
  background-color: #252525;
}
.navbar-inverse .navbar-brand {
    color: whitesmoke;
}
.navbar-inverse .navbar-brand:hover{
    color: #f26522;
}
     </style>
 </head>
 <body style="background-color:#dbb02f;overflow:visible;height:100%" >

 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <div class="active"><a class="navbar-brand" href="index.php">Boutique</a></div>
    </div>
  </div>
</nav>
<div class="panier" style="margin-top:100px;margin-bottom:20px">

     
                     
  <?php
session_start();
include "connect.php";
if (!isset($_SESSION['num_prod'])) {
    $_SESSION['num_prod'] = 0;
  }

$query = "SELECT * FROM historique_des_achats c
          INNER JOIN product p ON c.id_product = p.id_product
          INNER JOIN users u ON c.id_user = u.id_user";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if ($result && mysqli_num_rows($result) > 0) {
    echo '<table>';
    echo '<tr>';
    echo '<th>Nom du produit</th>';
    echo '<th>Quantité du produit</th>';
    echo '<th>Prix du produit</th>';
    echo '<th>Prix total</th>';
    echo '<th></th>';
    echo '</tr>';
    $totalMontant=0;
    while ($row = mysqli_fetch_assoc($result)) {
        $montantProduit = $row['price'] * $row['quantite'];
        $totalMontant += $montantProduit;
        ?>
       
        <tr cellpadding="8px" cellspacing="4px">
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['quantite']; ?></td> <!-- Affichage de la quantité -->
            <td><?php echo $row['price']; ?> DH</td>
            <td><?php echo $montantProduit; ?> DH</td>
            <td><a href="supprimer_panier.php?id=<?=$row['id_product']?> &histo=<?=$row['id_historique']?> "  class="supp"  >supprimer</a>
        </tr>
        
        <?php
    } ?> 

        <tr>
            <th>Prix total</th>
            <td colspan="7"><?php echo $totalMontant;?> DH</td>
        </tr>
        
        
        
<?php } else {
    ?>
    <tr>
        <td colspan="4">Aucun produit dans le panier</td>
    </tr>
</div>
    
    <?php
}


?>

