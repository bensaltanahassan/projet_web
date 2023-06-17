<?php
$n=0;
session_start();
 //connexion à la base de données
 include "connect.php";
 //verifier la connexion


$idUser = $_SESSION['id'];
if($n==1){
  $query = "INSERT INTO card (id_user) VALUES ($idUser)";
  $result = mysqli_query($conn, $query);
}
if(!isset($_SESSION['id'])){
  header("loaction:login.php");
}

if (isset($_POST['valider'])) {
  $n++;
  echo '<script> alert("Produit ajouté au panier");</script>';
  $idProduct = $_POST['hide'];
  
  
  
  // Récupérer la quantité du formulaire
  if(isset($_POST['quant'])){
    $quantite = $_POST['quant'];
  } else {
    $quantite = 1; // Utiliser 1 comme valeur par défaut si la quantité n'est pas spécifiée
  }
  $_SESSION['num_prod']=0;
  // $num=0;
  

  // Vérifier si le produit existe dans la table product
  $query = "SELECT * FROM product WHERE id_product = $idProduct";
  $result = mysqli_query($conn, $query);
  $product = mysqli_fetch_assoc($result);
  
  if ($product) {
    
    $idUser = $_SESSION['id']; // Supposons que l'ID de l'utilisateur est stocké dans la variable de session "id_user"
   // $idUser = 1;

    $query = "INSERT INTO historique_des_achats (id_user, id_product, quantite) VALUES ($idUser, $idProduct, $quantite)";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
      $_SESSION['num_prod']++;
      $_SESSION['selected_products'][] = $idProduct; 
      $_SESSION['num_prod'] = count($_SESSION['selected_products']);
      // Redirection vers la page du panier
      header("Location: panier.php");
      exit();
    } else {
      // Gestion des erreurs
      echo "Une erreur est survenue lors de l'ajout du produit au panier.";
    }
  } else {
    // Le produit n'existe pas
    echo "Le produit sélectionné n'est pas disponible";
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
     <title>Ma Boutique - Accueil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .product {
            width: 200px;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        .product img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .product h3 {
            margin: 0;
            font-size: 16px;
        }

        .product p {
            margin: 0;
            font-size: 14px;
            color: #666;
        }
    .containeer{
        display:inline-block;
    }
    h3,h5,label{
      font-weight: bold;
    }
    p{
        margin-bottom: 10px;
    }
    h5{
        margin-top: 10px;
    }
    .ajouter:hover{
        color: #fff;
  background-color: orangered;
  border-color: orangered;
}
    </style>
</head>
<body>
    <!-- afficher le nombre de produit dans le panier -->
     
      <?php  //if(isset($_SESSION['num_produits'])){
        //  $num=$_SESSION['num_product'];
         
         $num = isset($_SESSION['num_product']) ? $_SESSION['num_product'] : 0;
        
      ?>

        <a href="panier.php" class="ajouter">Panier<span><?php echo $num?></span></a>
    
    <!-- <section class="products_list"> -->
      <?php
      //inclure la page de connexion
      
    //connexion à la base de données
    include "connect.php";
    //verifier la connexion
  
    ?>
    <div class="container mt-4" style="display:inline-block;">
        
        <div class="row">
          <?php
      $req=mysqli_query($conn,"SELECT * FROM  product ");
      while($row=mysqli_fetch_assoc($req)) {
      ?>
      
      <form  method="POST" action=""  style="display:inline-block;margin-left:65px" >
      


            <!-- <div class="col-md-4"> -->
                <div class="product">
                
                    <h3><?php echo $row['name']?></h3>
                    <img src="images/<?php echo $row['filename']?>">
                    <p><?php echo $row['desc']?></p>
                    <h5><?php echo $row['price']?>€</h5>
                    <label for="quantite" >Quantité :</label>
            <div  id="quantity">
               <div class="counter d-flex">
            
          
            <!-- <button type="button" class="btn btn-primary mx-2" onclick="incrementerQuantite()">+</button> -->
            <input type="number" class="qty" name="quant" id="quantite<?=$row['id_product']?>" min="1" value="1">
            <!-- <button type="button"  class="btn btn-primary mx-2"  onclick="decrementerQuantite()">-</button> -->
                </div>
            </div>     

      <div>    
          
        
          <input type="hidden" name="hide" value="<?=$row['id_product']?>"/>
          <input type="submit" value="Ajouter au panier" class="ajouter" name="valider"/>

      </div>
    </div>

            <!-- </div> -->
            <!-- Fin de la boucle -->
        </div>
    
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


      </form>
      
      <?php  }  ?>
</body>
</html>