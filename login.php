<?php
session_start();
@$email = $_POST["email"];
@$pass = $_POST["pass"];
@$valider = $_POST["valider"];
$erreur = "";
$erreur0 = $erreur1 = '';
if (isset($valider)) {
  
  include("connexion.php");
  $sel = $pdo->prepare("SELECT * FROM users WHERE email = ? AND pass = ? LIMIT 1");
  $sel->execute([$email, $pass]);
  $tab = $sel->fetchAll(PDO::FETCH_ASSOC);
  if (count($tab) > 0) {
    $_SESSION["prenomNom"] = ucfirst(strtoupper($tab[0]["last_name"])) . " " . strtolower($tab[0]["first_name"]);
    $_SESSION["id"] = $tab[0]["id_user"];
    $_SESSION["nom"] = $tab[0]["last_name"];
    $_SESSION["prenom"] = $tab[0]["first_name"];
    $_SESSION["adres"] = $tab[0]["adress"];
    $_SESSION["phonee"] = $tab[0]["phone"];
    $_SESSION["maill"] = $tab[0]["email"];
    $_SESSION["passw"] = $tab[0]["pass"];
    $_SESSION["autoriser"] = "oui";
    header("location:index.php");
  } else
    $erreur = "Mauvais email ou mot de passe!";
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <style>
    body,
    html {
      height: 100%;
      margin: 0;
      padding: 0;
      overflow: hidden;
    }

    .erreur {
      color: RED;
      margin-bottom: 10px;
      font-size: 16px;
      font-style: italic;
      margin-left: 50px;
      font-weight: bold;
      font-family: comic;
    }

    label {
      color: black;
      font-weight: bold;
      margin-top: 20px;
      margin-bottom: 10px;
    }

    .custom-select {
      color: grey;
      font-size: 14px;
      height: 35px;
      width: 504px;
      border-radius: 6px;
      border: 1px solid #ced4da;
      background-color: #f8f9fa;
      color: #495057;
    }

    .registration-form {
      padding: 50px 0;
      width: 770px;
      height: 80px;
    }

    .registration-form form {
      background-color: #fff;
      max-width: 600px;
      margin: auto;
      padding: 30px 50px;
      border-top-left-radius: 30px;
      border-top-right-radius: 30px;
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
      border-radius: 10px;
      backdrop-filter: blur(10px);
      border: 2px solid rgba(255, 255, 255, 0.1);
      box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
    }

    .headding {
      text-align: center;
      font-weight: bold;
      color: var(--bs-orange);
    }

    input :invalid {
      animation: shake 300ms;
      color: red;
    }

    @keyframes shake {

      25% {
        transform: translateX(4px);
      }

      50% {
        transform: translateX(-4px);
      }

      75% {
        transform: translateX(4px);
      }
    }

    .fa-align-justify:before {
      content: "\f039";
      color: #17a2b8;
    }

    #container {
      padding: 50px;
    }

    .ombre {
      height: auto;
      width: 500px;
      /* rgba(255,255,255,0.13) */
      background-color: #fff;
      position: relative;
      margin-top: 300px;
      margin-bottom: -20px;
      left: 50%;
      transform: translate(-50%, -50%);
      border-radius: 10px;
      backdrop-filter: blur(10px);
      border: 2px solid rgba(255, 255, 255, 0.1);
      box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
      padding: 50px 40px;
    }

    .btn-inf {
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

    .btn-dang {
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

    .container {
      margin-top: 40px;
      display: flex;
      justify-content: center;
      gap: 20px;

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
      box-shadow: 0 0 0 0.2rem rgba(253, 126, 20, 0.6);
    }
  </style>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

  <div id="wrapper">
    <div class="col-lg-12">
      <div class="col-lg-6">
        <div class="registration-form">
          <form role="form" method="post" action="" enctype="multipart/form-data" style="margin-left:500px;margin-right:-200px">
            <h2 class="headding">
              Se connecter
            </h2>
            <div class="erreur"><?php echo $erreur; ?></div>
            <div class="form-group">
              <label>Email</label>
              <input class="form-controle" type="email" placeholder="Email" name="email" required>

            </div>
            <div class="form-group">
              <label>Mot de passe</label>
              <input class="form-controle" placeholder="mot de passe" name="pass" required>

            </div>
            <div class="container">
              <button type="submit" class=" btn-inf" name="valider">Se connecter</button>
              <button type="reset" class=" btn-dang">Annuler</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Morris Charts JavaScript -->
  <script src="js/plugins/morris/raphael.min.js"></script>
  <script src="js/plugins/morris/morris.min.js"></script>
  <script src="js/plugins/morris/morris-data.js"></script>
</body>

</html>
