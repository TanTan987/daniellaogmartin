<?php

define('DB_NAME', 'daniellaogmartin');
define('DB_USER', 'daniellaogmartin');
define('DB_PASSWORD', 'ASnu5gHPnBZyQno');
define('DB_HOST', 'daniellaogmartin.mysql.domeneshop.no');

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

/*Code for button*/
  if (validateForm() === true) {
    if(isset($_POST['submit'])){
      $value = $_POST['firstName'];
      $value2 = $_POST['lastName'];
      $value3 = $_POST['email'];
      $value4 = $_POST['attendance'];
      $value5 = $_POST['other'];

      $sql = "INSERT INTO rsvp (firstName, lastName, email, attendance, other) VALUES ('$value', '$value2',
      '$value3', '$value4', '$value5')";
      mysqli_query($link, $sql);

       echo "<script type='text/javascript'>alert('Takk! Du er nå registrert.')</script>";
       header("Location: http://www.daniellaogmartin.no/frontpage.html");
      exit;

      mysqli_close();
    }
  else {
    throw new Exception("Vennligst fyll ut skjemaet");
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
 <!--Validation-->
 <!-- <script src="validation.js"></script> -->
 <!--Fonts for title-->
 <link href="https://fonts.googleapis.com/css?family=Alex+Brush|Great+Vibes|Lovers+Quarrel|Rouge+Script|Dancing+Script|Poppins" rel="stylesheet">
     <title>Daniella & Martin</title>
<script type="text/javascript">
//Validation of RSVP
var firstName = document.getElementById("firstName").value;
var lastName = document.getElementById("lastName").value;
// var letters = /^[A-Za-z]+$/;
var letters = /^[a-zA-ZæøåÆØÅ .\-]{2,25}$/;
var email = document.getElementById("email").value;

//firstname
function validateFirstName() {
  if (isEmpty(firstName) || (!firstName.match(letters))) {
    alert("Vennligst skriv inn fornavn");
    document.getElementById("firstName").setAttribute("class", "err");
    return false;
  }
  else {
    document.getElementById('firstName').setAttribute("class", "input");
}}

//lastname
function validateLastName() {
  if (isEmpty(lastName) || (!lastName.match(letters))) {
    alert("Vennligst skriv inn etternavn");
    document.getElementById("lastName").setAttribute("class", "err");
    return false;
  }
  else {
    document.getElementById('lastName').setAttribute("class", "input");
}}

//email
//if email is empty
function validateEmptyEmail() {
  if (isEmpty(email)) {
    alert("Vennligst skriv inn en epostadresse");
    document.getElementById("email").setAttribute("class", "err");
    return false;
  }
  else {
    document.getElementById('email').setAttribute("class", "input");
}}

//validates email address
function validateEmailChar() {
  if (!(validateEmail(email))) {
    alert("Vennligst skriv inn en gyldig epostadresse");
    document.getElementById("email").setAttribute("class", "err");
    return false;
  }
  else {
    document.getElementById('email').setAttribute("class", "input");
}

//validates radioboxes
function validateAttendance(){
  if (validateRadio(document.forms["rsvp"]["attendance"])) {
    return true;
  }
  else {
    alert("Vennligst svar på om du kommer eller ikke ");
    return false;
}}

function validateRadio(radios){
  for (i = 0; i < radios.length; ++ i){
    if (radios [i].checked) {
      return true;
  }
  return false;
}}

//Checks for empty string
function isEmpty(str) {
  return (!str || 0 === str.length);
}

//Validates email
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validateForm(){
  $fnameOK = validateFirstName();
  $lnameOK = validateLastName();
  $emptyemailOK = validateEmptyEmail();
  $emailOK = validateEmailChar();
  $attendanceOK = validateattendance();

  if($fnameOK && $lnameOK && $emptyemailOK && $emailOK && $attendanceOK){
    return true;
  }
  else {
    return false;
}
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
 <form method="post" name="rsvp" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

 <!--First name-->
 <div class="row">
     <label class="label" for="firstName">Fornavn *</label>
     <input type="text" name="firstName" id="firstName" class="input" placeholder="Skriv inn fornavn..." onchange="validateFirstName" required>
 </div>
 <br>

 <!--Last name-->
 <div class="row">
     <label class="label" id="lastNameLbl" for="lastName">Etternavn *</label>

     <input type="text" name="lastName" id="lastName" class="input" placeholder="Skriv inn etternavn..." required>
 </div>
 <br>

 <!--Email-->
 <div class="row">
     <label class="label" for="email">Epost *</label>
     <input type="text" name="email" id="email" class="input" placeholder="Skriv inn epostadresse..." required>
 </div>
   <br>
 <!--Attendance-->
 <div class="row">
   <label class="label" for="attendance">Kommer du i vårt bryllup? *</label>
   <br>
   <label class="label" for="attendance">Ja</label>
   <input type="radio" name="attendance" class="radiobutton" id="attendanceYes" class="input" value="1" checked="checked">
   <label class="label" for="attendance">Nei</label>
   <input type="radio" name="attendance" class="radiobutton" id="attendanceNo" class="input" value="0">
 </div>
   <br>

 <!--Allergies and others-->
 <div class="row">
   <label class="label" for="other">Allergier eller andre ting vi burde vite om?</label>
   <br>
   <textarea name="other" id="other" class="inputOther" placeholder="Skriv inn..."></textarea>
 </div>
 <br>

 <!--Submit button-->
 <div id="buttonTest">
   <button name="submit" value="Send" class="button" onclick="validateForm()">Send inn</button>
 </div>
 </form>

 </div>

       </body>
     </html>
