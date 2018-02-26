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
