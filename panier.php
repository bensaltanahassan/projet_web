<!DOCTYPE html>
  <html lang="en">
    <head>
    <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>shop</title>
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
     
 </head>
 <body class="panier">
     <a href="acc.php" class="ajouter">Boutique</a>
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
  
    
    <?php
}


?>



