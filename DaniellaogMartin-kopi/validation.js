//Validation of RSVP
function validateForm() {
  var firstName = document.getElementById("firstName").value;
  var lastName = document.getElementById("lastName").value;

  var letters = /^[A-Za-z]+$/;
  //var numbers = /^[0-9]+$/;
  var email = document.getElementById("email").value;



//firstname
    if (isEmpty(firstName) || (!firstName.match(letters))) {
        alert("Fyll inn fornavn");
        document.getElementById("firstName").setAttribute("class", "err");
        return false;
    }

    else {
      document.getElementById('firstName').setAttribute("class", "input");
    }

//lastname
    if (isEmpty(lastName) || (!lastName.match(letters))) {
        alert("Fyll inn etternavn");
        document.getElementById("lastName").setAttribute("class", "err");
        return false;
    }

    else {
      document.getElementById('lastName').setAttribute("class", "input");
    }


//email
//if email is empty
    if (isEmpty(email)) {
      alert("Vennligst skriv inn en epostadresse.");
      document.getElementById("email").setAttribute("class", "err");
      return false;
         }
    else {
      document.getElementById('email').setAttribute("class", "input");
    }

//validates email address
     if (!(validateEmail(email))) {
         alert("Vennligst skriv inn gyldig epostadresse!");
         document.getElementById("email").setAttribute("class", "err");
         return false;
     }
     else {
       document.getElementById('email').setAttribute("class", "input");
     }




//Checks for empty string
function isEmpty(str) {
   return (!str || 0 === str.length);
}

//Checks for numeric strings
function isNumeric(str) {
  if (!isNaN(str)) {
    return true;
  }
  else {
    return false;
  }
  }

//Validates email
function validateEmail(email) {
   var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
   return re.test(email);
     }
}

//(!(name.value.match(letters)))
