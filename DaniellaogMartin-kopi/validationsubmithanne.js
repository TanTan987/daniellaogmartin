// Function to prevent the form from submitting if the form is not valid.
window.onload=function () {
  document.getElementById("form").onsubmit = function(evt) {
    evt.preventDefault();
    if (validateForm()) {
      sendEmail(evt.target);
      return true;
    }
    // If the form is not valid, the email will not be sent on submit.
    return false;
  }

/*
 * Function for adding the error function to the email-field if the field is not
 * validated. When the validateEmail-function has ran, and the mail is valid, the function
 * removes the error-styling.
 */
  document.getElementById("email").addEventListener("input", function(evt) {
    if (!validateEmail(evt.target)) {
      error(evt.target);
    } else {
      removeError(evt.target);
    }
  });

/*
 * This function does the same as the function over, by iterating over all fields
 * assigned the class input, and removing and adding the error-styling, based on if the input
 * fields are empty or not. It runs the function isEmpty, instead of validateEmail,
 * since the validation of these other fields does not require as much validation.
 */
  var inputs = document.getElementsByClassName("input");
  for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].id != "email") {
      document.getElementById(inputs[i].id).addEventListener("input", function (evt) {
        if (isEmpty(evt.target.id)) {
          error(evt.target);
        } else {
          removeError(evt.target);
        }
      });
    }
  }
}

/* A function for validation of all form input fields. The function checks whether
 * the input field is a email-field or a regular input-field, if it's a email-field, it
 * validates it with the validateEmail-function, and continues it's validation.
 * If the field does not have the id "email", the function runs the isEmpty-function.
 * When all fields are valid, the function will return valid.
 */
function validateForm() {
  var valid = true;
  var inputs = document.getElementsByClassName("input");

  for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].id === "email") {
      if (validateEmail(inputs[i])) {
        continue;
      } else {
        error(inputs[i]);
        valid = false;
      }
    }
    if (isEmpty(inputs[i].id)) {
      error(inputs[i]);
      valid = false;
    }
  }
  return valid;
}

/*
 * Function for validation of the email-field. Since an email
 * has to consist of something before "@" and something after, and
 * there also has to be at least two characters after the "." the function makes sure
 * the email is not valid until there are text before, after and in between both
 * the "." and "@".
 */
function validateEmail(emailField) {
  if (isEmpty(emailField.id)){
    return false;
  }
  else if (!emailField.value.includes("@")) {
    return false;
  }
  else if (!emailField.value.includes(".")) {
    return false;
  }
  else if (emailField.value.indexOf("@")!=0) {
    if (emailField.value.indexOf("@") + 1
        < emailField.value.lastIndexOf(".")
        && emailField.value.indexOf(".")
        < emailField.value.length-2) {
      return true;
    }
  }
}

// Checks if the fields value is empty or not.
function isEmpty(id) {
  var field = document.getElementById(id).value;
  if (field) {
    return false;
  }
  else {
    return true;
  }
}
/*
 * Function for adding the error-message to the intended input-field,
 * when field is not valid.
 */
function error(field) {
  field.classList.add("invalid");
  var id = field.id + "Error";
  var message;
  // Instead of all error-messages having one single static message, the email-field has it's own.
  if (field.id == "email") {
    message = "Email not valid!";
  }
  else {
    message = "Cannot be empty";
  }
  var error = document.getElementById(id);
  error.innerHTML=message;
  error.classList.add("active");
}

// Function for removing the error-message when the intended input-field is valid.
function removeError(field) {
  field.classList.remove("invalid");
  var id = field.id + 'Error';
  var error = document.getElementById(id);
  error.classList.remove("active");
}

/*
FILE NAME: sendEmail.js
WRITTEN BY: Vegar Andreas Bergum
WHEN: November 2017
PURPOSE: Functionality for using EmailJS's email API
*/

/*
 * Send email throught the EmailJS API
 * @param {object} form - form with the input fields that should be in the
 */
function sendEmail(form) {
  var params = serializeFormData(form);

// MODIFIED FROM EMAILJS'S DOCUMENTATION
  // define id's from the API
  var service_id = 'gmail';
  var template_id = 'defaultTemplate';

  // update the button's text to reflect the process of sending the email
  document.getElementById('submit').innerHTML = 'Sending..';

  // emailJS function to send the email through the API
  emailjs.send(service_id, template_id, params)
    .then(function() {
      alert("Sent!");
      document.getElementById('submit').innerHTML = 'Send mail';
    }, function(err) {
      // JSON.stringify doesn't work properly without jQuery, but it displays
      // the error nonetheless.. just not well formatted...
      alert('Send email failed!\r\n\ Response:\n' + JSON.stringify(err));
      document.getElementById('submit').innerHTML = 'Send mail';
    });
  return false;
}

/*
 * Serializes all the input-fields in the exact form in ../faq-contact.html
 * @param {object} form - an HTML form with input-fields with class 'input'
 * @return {object} params - serialized data of all the input fields in form
 */
function serializeFormData(form) {
  var inputs = form.getElementsByClassName('input');
  var fields = [];
  var params;

  // grabs values from the input-fields
  for (var i = 0; i < inputs.length; i++) {
    fields.push(inputs[i].value);
  }

  // formats the data as a suitable object
  // This will only work for the exact form in ../faq-contact.html
  var params = {
                  'name': fields[0],
                  'email': fields[1],
                  'subject': fields[2],
                  'message': fields[3],
               };

  return params;
}
