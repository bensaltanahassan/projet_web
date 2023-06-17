<!doctype html>
<html>
  <head>
           <meta charset="UTF-8">
           <meta http-equiv="X-UA-Compatible" content="IE=edge">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <title>inscription</title>
       <?php
        include('header.php');
        session_start();
        @$nom=$_POST["nom"];
        @$prenom=$_POST["prenom"];
        @$adresse=$_POST["adresse"];
        @$phone=$_POST["phone"];
        @$email=$_POST["email"];
        @$pass=$_POST["pass"];
        @$valider=$_POST["valider"];
        $erreur0=$erreur1=$erreur2=$erreur3=$erreur4=$erreur5=$erreur6=$erreur7=$erreur8='';
        $erreur9=$erreur10=$erreur11=$erreur12=$erreur13=$erreur14=$erreur15=$erreur16=$erreur17='';
        $erreur18=$erreur19='';
        $derniere_valeur='';
        $erreur=0;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "database";

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Vérification de la connexion
        // if ($conn->connexion_error) {
        //       die("Erreur de connexion à la base de données : " . $conn->connexion_error);
        // }
        function genererMotDePasse($longueur = 8) {
            $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $motDePasse = '';
            
            // Générer chaque caractère du mot de passe de manière aléatoire
            for ($i = 0; $i < $longueur; $i++) {
                $index = random_int(0, strlen($caracteres) - 1);
                $motDePasse .= $caracteres[$index];
            }
            
             return $motDePasse;
           }
        $motDePasse = genererMotDePasse();
        
        if (isset($valider)) {

        if(empty($nom))  $erreur1= "Nom laissé vide!";
        if (!preg_match('#^[A-Za-z]+$#', $nom)) {
            $erreur1= "Le nom doit contenir uniquement des lettres.";
          $erreur+=1;}
            
        if(empty($prenom)) $erreur2="Prénom laissé vide!";
        elseif (!preg_match('#^[A-Za-z]+$#', $prenom)) {
            $erreur2="Le prénom doit contenir uniquement des lettres.";
            $erreur+=1;}
        if(empty($email)) $erreur12="Email laissé vide!";   
        elseif(!preg_match("#^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$#", $email)){
            $erreur11="Format invalid!email incorrect";
            $erreur+=1;
        }
        if(empty($phone)) $erreur13= "Numéro de téléphone laissé vide!";
        elseif(!preg_match("#^(06|07)\d{8}$#", $phone)){
            $erreur13= "Format invalid!Le numéro de téléphone doit commencer par 06 ou 07 et doit contenir 10 chiffres au total ";
            $erreur+=1;
          }
        if($erreur==0){
        // Requête SQL pour insérer les données dans la table
        $sql = "INSERT INTO users
        (last_name,first_name,adress,phone,email,pass)
        VALUES ('".$nom."','".$prenom."','".$adresse."','".$phone."','".$email."','".$pass."')";
      
        if ($conn->query($sql) === TRUE) {
        ?><script type="text/javascript">
        alert("Vous-êtes inscrie avec succés.");
        window.location="index.php";
        
        </script>
         <?php 
        } else {
            echo "Erreur lors de l'ajout des données : " . $conn->error;
        }
// Fermeture de la connexion à la base de données
$conn->close();
}
}   
?>

<style>
    
    .erreur{
    color:RED;
    margin-bottom:10px;
    font-size: 16px;
    font-style:italic;
    margin-left: 50px;
    font-weight: bold;
    font-family:comic ;}
    label{
    color:black;
    font-weight:bold;
    }        
    .custom-select {
    color:grey;
    font-size: 14px;
    height: 35px;
    width: 504px;
    border-radius: 6px;
    border: 1px solid #ced4da;
    background-color: #f8f9fa;
    color: #495057;
    }
    .registration-form{
	padding: 50px 0;
    width:770px;
    height:80px;
    } 

    .registration-form form{
    background-color: #fff;
    max-width: 600px;
    margin: auto;
    padding: 30px 50px;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
}
.headding{
    text-align:center;
    font-weight: bold;
    color: var(--bs-orange);}
 
 input :invalid{
      animation: shake 300ms;
      color :red; 
    }
    @keyframes shake {

      25%{
        transform:translateX(4px);
      }
      50%{
        transform:translateX(-4px);
    }
      75%{
      transform:translateX(4px);
    }}
.fa-align-justify:before{
  content: "\f039";
  color:#17a2b8;
}

#container{padding: 50px;}
.ombre{
    height: auto;
    width: 500px;
    /* rgba(255,255,255,0.13) */
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
    .btn-inf{
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
  width: 120px;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.btn-inf:hover {
  color: #fff;
  background-color: #1b9b38;
  border-color: #1b9b38;
}
.btn-dang{
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
  width: 120px;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.btn-dang:hover {
  color: #fff;
  background-color: #b7911f;
  border-color: #b7911f;
}
.form-controle {
  display: block;
  width: 100%;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.form-controle:focus {
  color: #495057;
  background-color: #fff;
  border-color: #dd8724;
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(253,126,20, 0.6);
}


   
</style>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
          integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I"
          crossorigin="anonymous">
    <script src=
"https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
            integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
            crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   

<?php
    //  include('connexion.php');
     include('header.php');
 ?>  
<body >
    <div id="wrapper">
            <div class="col-lg-12">
                <div class="col-lg-6" >
                    <div class="registration-form">
                        <form role="form"  method="post" action="" enctype="multipart/form-data" style="margin-left:500px;margin-right:-200px" > 
                        <h2 class="headding">
                           S'inscrire
                        </h2>
                        
                            <div class="form-group">
                            <label>Nom</label>
                              <input class="form-controle" placeholder="Nom" name="nom"  required>
                            <div class="erreur"><?php echo $erreur1; ?></div>
                            </div>
                        
                            <div class="form-group">
                              <label>Prénom</label>
                              <input class="form-controle" placeholder="Prenom" name="prenom" required>
                            <div class="erreur"><?php echo $erreur2; ?></div>
                            </div> 
                            <div class="form-group">
                              <label>Mot de passe</label>
                              <input class="form-controle" placeholder="mot de passe" name="pass" value="<?php echo $motDePasse;?>" required >
                              <div class="erreur"><?php echo $erreur3; ?></div>
                            </div> 
                            <div class="form-group">
                              <label >Adresse</label>
                                <input class="form-controle" placeholder="Adresse" name="adresse" required>
                              <div class="erreur"><?php echo $erreur8;?></div>
                            </div>                          
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-controle"  type="email" placeholder="Email" name="email" required>
                              <div class="erreur"><?php echo $erreur12; ?></div>
                            </div>                             
                            <div class="form-group">
                              <label>Téléphone</label>
                              <input class="form-controle" placeholder="N° de téléphone" name="phone"  required>
                              <div class="erreur"><?php echo $erreur13; ?></div>
                            </div>                             
                            <button type="submit"  class="btn-inf" name="valider">S'inscrire</button>
                            <button type="reset"  class="btn-dang">Annuler</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    <script>
                function con(){
                window.location.href= "index.php";
              }
			</script>	  
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
    </body>
</html>