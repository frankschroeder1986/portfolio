<?php

 $name = $_POST["name"];
 $email = $_POST["email"];
 $message = $_POST["message"];

 if( mail("frankschroeder1986@gmail.com", "Portfolio", $message, "From: Absender <" .$email. ">"))
 {
    echo "erfolgreich gesendet";
 }

 else{
    "hat nicht geklappt";
 }

 echo "error";

?>