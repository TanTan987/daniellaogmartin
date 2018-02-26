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

       echo "<script type='text/javascript'>alert('Takk! Du er nå registrert.')</script>";
       header("Location: http://www.daniellaogmartin.no");
     exit;

     mysqli_close();
     }

 ?>
