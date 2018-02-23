var mysql = require('daniellaogmartin.sql');

var firstName = document.getElementById("firstName").value;
var lastName = document.getElementById("lastName").value;
var email = document.getElementById("email").value;
var attendance = document.getElementsByName('attendance').value;
var other = document.getElementById("other").value;



var con = mysql.createConnection({
  host: "daniellaogmartin.mysql.domeneshop.no",
  user: "daniellaogmartin",
  password: "ASnu5gHPnBZyQno",
  database: "DaniellaogMartinDB"
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
  var sql = "INSERT INTO rsvp (fname, lname, email, attendance, other) VALUES (firstName, lastName, email, attendance, other)";
  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log("1 record inserted");
  });
});
