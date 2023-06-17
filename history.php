<?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $db= "database";
       $connection = new mysqli($servername, $username, $password, $db);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>history</title>
    
</head>
<body>
    

    <div class="py-5">
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>quantite</th>
                                    <th>total amount</th>
                                    <th>Date</th>
                                    <th>View</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT h.montant_total,h.quantite,p.price,h.date_achat,p.filename FROM historique_des_achats h , product p where h.id_historique=p.id_product ORDER BY h.date_achat";
                                $result = $connection->query($sql);
                                //var_dump(mysqli_fetch_array($result));
                                if(isset($result)) {
                                    ?>
                                    

                                    <?php

                                }else{
                                    while($product= mysqli_fetch_array($result) ){

                                        ?>
                                        <tr>
                                        <td><img src="img/<?= $product["filename"]?>" style="height:15px"></td>
                                        <td><?=$product["price"];?></td>
                                        <td><?=$product["quantite"];?></td>
                                        <td><?=$product["montant_total"];?></td>
                                        <td><?=$product["date_achat"];?></td>
                                        <td>
                                            <a href = "/details.php/?id=$i"class="btn btn-primary">View</a>
                                        </td>
                                        <td>
                                            <a onClick="return popUpDeleteCatgorie()" class = "btn btn-danger " href = "/delete.php/?id=$i">Delete</a>
                                        </td>
                                        </tr>
                                        <?php
                                        }}
                                        ?>    
                                
                            
                            </tbody>
                        </table>
                           
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function popUpDeleteCatgorie(){
        return confirm("Are you sure you want to delete ?");
    }
</script>
</html>
<?php
    // footer
?>