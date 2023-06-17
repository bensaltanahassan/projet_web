<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

session_start();
if(isset($_POST["login"]) && isset($_POST["pass"])) {
    // Récupérer les valeurs du formulaire
    $newLogin = $_POST["login"];
    $newPassword = $_POST["pass"];
    $updateQuery = "UPDATE users SET email = '$newLogin', pass = '$newPassword' WHERE id_user = {$_SESSION["id"]}";
    $result = mysqli_query($conn, $updateQuery);
    if($result) {
        // Mise à jour réussie
        $_SESSION["maill"] = $newLogin;
        $_SESSION["passw"] = $newPassword;
        echo '<script> alert("Update successful!")</script>';
    } else {
        // Erreur lors de la mise à jour
        echo '<script> alert("Update failed!")</script>';
    }
}

?>
<style>
     html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Empêche le défilement de la page */
        }
    label{
            color:black;
            margin-bottom:8px; 
    }  
    input{
          
           width:200px;
           height:30px;
           border-radius: 16px;
           border: 1px solid black;
           margin-bottom:20px;
           display:flex;
           align-items:center;
           justify-content:center;   
           }
  .headding{
            text-align:center;
            font-weight: bold;
            color:#ff7f00;} 
.bouton{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    outline: none;
    color: #fff;
    width: 150px;
    height: 40px;
    text-transform:uppercase;
    margin-top:30px;
    margin-left:30px;
    margin-bottom:0px;
    cursor:pointer;
    position:relative;
    font-size: 14px;
    font-style:italic;
    font-weight: bold;
    font-family:comic ;
    border-radius: 12px;
    background-color:#026CD7;
    transition: background-color 0.3s ease;
    
         }
         .bouton:hover{
          width: 152px;
          height: 42px;
         }

.pro{
    width:100%;
    display:grid;
    place-items:center;    }
.container {
    display: flex;
    justify-content: center;
    gap: 20px;
 }
.ombre{
    height: auto;
    width: 500px;
    background-color: #fff;
    position: relative;
    margin-top:300px;
    margin-bottom:-20px;
    left: 50%;
    transform: translate(-50%,-50%);
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 40px;
         }   
.entree{
  justify-content:center;
  display:block;
  /* margin-left:8px; */
}         

    /* h1, h2 {
            text-align:center;
            font-weight: bold;
            color: var(--bs-orange);}  */
    .btn-inf{
  width: 150px;
  height: 40px;
  margin-top:30px;
  margin-bottom:0px;
  cursor:pointer;
  color: #fff;
  background-color: #28a749db;
  border-color: #28a749db;
  display: inline-block;
  font-weight: 400;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  border: 1px solid transparent;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 0.25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.btn-inf:hover {
  color: #fff;
  background-color: #1b9b38;
  border-color: #1b9b38;
}
.btn-dang{
  width: 150px;
  height: 40px;
  margin-top:30px;
  margin-bottom:0px;
  cursor:pointer;
  color: #fff;
  background-color: #dbb02f;
  border-color: #dbb02f;
  display: inline-block;
  font-weight: 400;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  border: 1px solid transparent;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 0.25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.btn-dang:hover {
  color: #fff;
  background-color: #b7911f;
  border-color: #b7911f;
}
</style>


</head>
<body bgcolor="whitesmoke">
<div id="wrapper">    
   <div class="col-lg-12">
      <div class="col-lg-6">
        <div class="ombre">
           <form method="POST" action="">
             
              <h2 class="headding">Modifier votre E-mail ou mot de passe</h2>
              <div class="pro">
                  
                <div class="entree">
                  <label>E-mail</label>
                    <input type="email" placeholder="email" name="login" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="veuillez respecter le format d'un email"  value="<?php echo $_SESSION["maill"]?>" required></input>
                </div>
                <div class="entree">
                   <label>Mot de passe</label>
                     <input  placeholder="password" name="pass" pattern="(?=.*[A-Z]).{8,}" title="Le mot de passe doit comporter au moins 8 caractères et une lettre majuscule"  value="<?php echo $_SESSION["passw"]?>" required></input>
                </div>
                <div class="container">
                <button type="submit" class="btn-inf">Update</button></div>
                
              </div></div>
            </form>
       </div>
      </div>  
    </div>    
  </div>
 
</body>
</html>