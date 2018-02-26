<?php
define('DB_NAME', 'daniellaogmartin');
define('DB_USER', 'daniellaogmartin');
define('DB_PASSWORD', 'ASnu5gHPnBZyQno');
define('DB_HOST', 'daniellaogmartin.mysql.domeneshop.no');

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


if(isset($_GET['submit'])){
$uname = $_GET["user"];
$pword = $_GET["pass"];

$sql = "SELECT * FROM login WHERE username = '$uname' AND password = '$pword'";
$resultat = $link->query($sql);

  if ($resultat->num_rows > 0)
  {
      echo 'Velkommen';
      header('Location:frontpage.html');
  }
  else
  {
      echo 'Feil brukernavn eller passord! ';
  }
}

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
 <!--Responsive mobile-->
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <!--CSS-->
 <link rel="stylesheet" type="text/css" href="password.css">

 <!--JS-->
 <!--Responsive menu-->
 <script src="responsivemenu.js"></script>

 <!--Fonts for title-->
 <link href="https://fonts.googleapis.com/css?family=Alex+Brush|Great+Vibes|Lovers+Quarrel|Rouge+Script|Dancing+Script|Poppins" rel="stylesheet">
     <title>Daniella & Martin</title>
   </head>
   <body>

 <center>
 <div class="sub-mainTitle">Velkommen!</div>
 <div class="sub-mainTitle">Vennligst logg inn</div>
 <br>

<form class="" action="index.php" method="get">

 <h3>Brukernavn:</h3>
   <form name="login">
     <input class="indexinput" name="user" type="text">

 <h3>Passord:</h3>
   <input class="indexinput" name="pass" type="password">
 </center>

 <center>
   <input class="indexbutton" type="submit" value="Logg inn">
 </center>
 </form>


       </body>
     </html>
