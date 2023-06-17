




<?php
session_start();
?>
<!doctype html>
<html>
<head>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Empêche le défilement de la page */
        }
        .headding{
            text-align:center;
            font-weight: bold;
            color: var(--bs-orange);} 
        .pro{
            width:100%;
            display:grid;
            place-items:center;  
        }
        .col-md-5{
            width: 600px;
        }
        label{
             color:black;
             margin-bottom:8px;
        }
        .container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
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
        input{
            width:400px;
            height:60px;
            border-radius: 10px;
            border:none;
            display:flex;
            justify-content:center;
        }
        .ombre{
            display:flex;        
            justify-content: center;
            height: auto;
            width: 620px;
            background-color: #fff;
            position: relative;
            margin-top:330px;
            margin-bottom:20px;
            left: 50%;
            transform: translate(-50%,-50%);
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,0.1);
            box-shadow: 0 0 40px rgba(8,7,16,0.6);
            padding: 40px 40px;
         }
     .entree{
        justify-content:center;
        display:block;
        margin-left:8px;
     }   
     
    
     h4{
        margin-bottom:8px;
        margin-top:10px; 
        font-weight:bold;
        color:black;
     }
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
<!-- bootstrap cdn -->
<link rel="stylesheet"
          href=
"https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
          integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I"
          crossorigin="anonymous">
    <script src=
"https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
            integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
            crossorigin="anonymous">
     </script>
</head>
<body style="background-color:whitesmoke;">
        <div class="ombre">  
        <div classs="pro">
        <center><h1 class="headding">Profil</h1></center><br>
        <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Nom</label><input type="text" class="form-control" value="<?php echo $_SESSION["nom"]?>" disabled></div>
                    <div class="col-md-6"><label class="labels">Prénom</label><input type="text" class="form-control"  value="<?php echo $_SESSION["prenom"]?>" disabled></div>
        </div>
        <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Numéro de téléphone</label><input type="text" class="form-control" value="<?php echo $_SESSION["phonee"]?>" disabled></div>
                    <div class="col-md-12"><label class="labels">Addresse </label><input type="text" class="form-control" value="<?php echo $_SESSION["adres"]?>" disabled></div>
                    <div class="col-md-12"><label class="labels">Email </label><input type="text" class="form-control" value="<?php echo $_SESSION["maill"]?>" disabled></div>
        </div>
       <div class="container">
       <button class="btn-inf" onclick=redirectToparametres()>modifier</button>
        <button class="btn-dang" onclick=redirectToNewPage()>Sortir</button>
        
        </div> 
        </div>    
        </div>
<script>
    function redirectToNewPage() {
         window.location.href = 'index.php';}
    function redirectToparametres() {
         window.location.href = 'parametres.php';}
</script>



</body>
</html>