<?php

define('DB_NAME', 'daniellaogmartin');
define('DB_USER', 'daniellaogmartin');
define('DB_PASSWORD', 'ASnu5gHPnBZyQno');
define('DB_HOST', 'daniellaogmartin.mysql.domeneshop.no');

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


/*Code for button*/
if(isset($_POST['submit'])){
  $value = $_POST['firstName'];
  $value2 = $_POST['lastName'];
  $value3 = $_POST['email'];
  $value4 = $_POST['attendance'];
  $value5 = $_POST['other'];

  $sql = "INSERT INTO rsvp (firstName, lastName, email, attendance, other) VALUES ('$value', '$value2',
  '$value3', '$value4', '$value5')";
  mysqli_query($link, $sql);

  // header("Location: http://www.daniellaogmartin.no/frontpage.html");
  // echo "<script type='text/javascript'>alert('Taaaakk');</script>";

  echo "<script> alert('Takk! Du er nå registrert.');
  window.location.href='http://www.daniellaogmartin.no/frontpage.html';
  </script>";

exit;

  mysqli_close();
}

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
 <!--Responsive mobile-->
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!--CSS-->
 <link rel="stylesheet" type="text/css" href="daniellaogmartin.css">
 <!--JS-->
 <!--Responsive menu-->
 <script src="responsivemenu.js"></script>
<!--Fonts for title-->
 <link href="https://fonts.googleapis.com/css?family=Alex+Brush|Great+Vibes|Lovers+Quarrel|Rouge+Script|Dancing+Script|Poppins" rel="stylesheet">
     <title>Daniella & Martin</title>
     <script type="text/javascript">


function validateFirstName() {
  regEx = /^[a-zA-ZæøåÆØÅ .\-]{2,20}$/;
  OK = regEx.test(document.rsvp.firstName.value);
  if(!OK){
    document.getElementById("WrongFname").innerHTML="*";
    document.getElementById("firstName").style="border: 1px solid red;";
    return false;
  }
  document.getElementById("WrongFname").innerHTML="";
  document.getElementById("firstName").style="border: none";

  return true;
}

function validateLastName(){
  regEx = /^[a-zA-ZæøåÆØÅ .\-]{2,20}$/;
  OK = regEx.test(document.rsvp.lastName.value);
  if(!OK){
    document.getElementById("WrongLname").innerHTML="*";
    document.getElementById("lastName").style="border: 1px solid red;";
    return false;
  }
  document.getElementById("WrongLname").innerHTML="";
  document.getElementById("lastName").style="border: none";

  return true;
}

//validates email address
function validateEmail() {
  re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  OK = re.test(document.rsvp.email.value);
  if (!(OK)) {
    document.getElementById("WrongEmail").innerHTML="*";
    document.getElementById("email").style="border: 1px solid red;";
    return false;
  }
  else {
    document.getElementById("WrongEmail").innerHTML="";
    document.getElementById("email").style="border: none";

    return true;
}}

function validateForm(){
    if(validateFirstName() && validateLastName() && validateEmail()){
      //make button enabled
      btnEn = document.getElementById('submitBtn').disabled = false;
      return btnEn;
    }
    else{
      //keep button disabled
      btnDis = document.getElementById('submitBtn').disabled = true;
      return btnDis;
    }}



  </script>
  </head>
  <body>
 <div id="wrapping">

 <div class="topnav" id="myTopnav">
   <a href="frontpage.html">Forside</a>
   <a href="images.html">Bilder</a>
   <a href="weddingday.html">Bryllupsdagen</a>
   <a href="information.html">Informasjon</a>
   <a href="wishlist.html">Ønskeliste</a>
   <a href="contacts.html">Kontakter</a>
   <a href="mysql.php" class="active">RSVP</a>
   <a href="javascript:void(0);" class="icon" onclick="responsiveMobile()">&#9776;</a>
 </div>
 <div id="containerAll">
 <div id="containerMain">
 <!--Title-->
   <div id="mainTitle">Daniella & Martin
   <img id="ringImage" src="bilder/other/gifteringer.png" alt="Rings"></div>
 <!--Sub-title-->
   <div class="sub-mainTitle">11.08.18</div>
   <div class="sub-mainTitle">Bryn Kirke</div>
 </div>

 <div id="containerInfo">
   <!--Title-->
   <div class="title">~RSVP~</div>

 <!--Connect to MySQL-->
   <form method="post" name="rsvp" action="" onsubmit="validateForm()" id="rsvp">
     <table>
     <tr>
             <td class="label">Fornavn:</td>
             <td><input type="text" name="firstName" onchange="validateFirstName()" onkeyup="validateForm()" id="firstName" class="input" placeholder="Skriv inn fornavn..." required></td>
             <td><div id="WrongFname">*</div></td>
     </tr>
     <tr>
            <td class="label">Etternavn:</td>
            <td><input type="text" name="lastName" onchange="validateLastName()" onkeyup="validateForm()" id="lastName" class="input" placeholder="Skriv inn etternavn..." required></td>
            <td><div id="WrongLname">*</div></td>
     </tr>
         <tr>
             <td class="label">Email:</td>
             <td><input type="text" name="email" onchange="validateEmail()" onkeyup="validateForm()" id="email" class="input" placeholder="Skriv inn epostadresse..." required></td>
             <td><div id="WrongEmail">*</div></td>
     </tr>
         <tr>
             <td class="label">Kommer du i bryllupet vårt?</td>
             <td><input type="radio" name="attendance" class="radiobutton" id="attendanceYes" class="input" value="1" checked>Ja
             <input type="radio" name="attendance" class="radiobutton" id="attendanceNo" class="input" value="0">Nei</td>
     </tr>
         <tr>
           <td class="label">Allergier eller andre ting vi burde vite om?</td>
           <td><textarea name="other" id="other" class="inputOther" placeholder="Skriv inn..."></textarea></td>
     </tr>
         <tr>
             <td><input id="submitBtn" class="button" type="submit" name="submit" value="Registrer"></td>
        </tr>
     </table>


 </form>

 </div>

       </body>
     </html>
