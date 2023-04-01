<?php
if(isset($_POST['email'])) {

    $email_to = "frankschroeder1986@gmail.com";
    $email_subject = "Kontaktformular: ".$_POST['name'];

    function died($error) {
        echo "Es tut uns leid, aber es gibt Fehler im Formular. ";
        echo "Diese Fehler erscheinen unten.<br /><br />";
        echo $error."<br /><br />";
        echo "Bitte beheben Sie diese Fehler.<br /><br />";
        die();
    }

    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('Es tut uns leid, aber es gibt Fehler im Formular.');       
    }

    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $message = $_POST['message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/';

    if(!preg_match($email_exp,$email_from)) {
        $error_message .= 'Die eingegebene E-Mail-Adresse ist ungültig.<br />';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if(!preg_match($string_exp,$name)) {
        $error_message .= 'Der eingegebene Name ist ungültig.<br />';
    }

    if(strlen($message) < 2) {
        $error_message .= 'Die eingegebene Nachricht ist ungültig.<br />';
    }

    if(strlen($error_message) > 0) {
        died($error_message);
    }

    $email_message = "Formulardetails unten:\n\n";

    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }

    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "E-Mail: ".clean_string($email_from)."\n";
    $email_message .= "Nachricht: ".clean_string($message)."\n";

    // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to
