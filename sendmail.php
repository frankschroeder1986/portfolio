<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Empfänger E-Mail-Adresse
    $empfaenger = "frankschroeder1986@gmail.com";

    // Betreff der E-Mail
    $betreff = "Neue Nachricht von " . $_POST["name"];

    // Nachrichtentext
    $nachricht = "Name: " . $_POST["name"] . "\n";
    $nachricht .= "E-Mail: " . $_POST["email"] . "\n\n";
    $nachricht .= $_POST["message"];

    // E-Mail-Header
    $header = "From: " . $_POST["email"] . "\r\n";
    $header .= "Reply-To: " . $_POST["email"] . "\r\n";

    // E-Mail senden
    mail($empfaenger, $betreff, $nachricht, $header);

    // Bestätigungsmeldung ausgeben
    echo "Vielen Dank für Ihre Nachricht!";
}
?>
