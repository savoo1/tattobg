<?php
$mailto = "theblackdahliatattoo@gmail.com";  //My email address

//getting customer data
$name = $_POST['name'];
$fromEmail = $_POST['email'];
$tattooplace = $_POST['tattooplace'];
$phone = $_POST['phone'];
$tattoocolor = $_POST['tattoocolor'];
$tattoosize = $_POST['tattoosize'];
$subject = "Kontakt sa sajta";


$subject2 = "Potvrda: Vaš zahtev je poslat sa tattoobeograd.rs"; // For customer confirmation

//Email body I will receive
$message = "Klijent: " . "\n" . $name . "\n\n" .
"Deo Tela: " . "\n" . $tattooplace . "\n\n" .
"Email: " . "\n" . $fromEmail . "\n\n" .
"Telefon: " . "\n" . $phone . "\n\n" .
"Boja Tetovaze: " . "\n" . $tattoocolor . "\n\n" .
"Velicina Tetovaze: " . "\n" . $tattoosize . "\n\n" .
"Poruka klijenta: " . "\n" . $_POST['message'];

//Message for client confirmation
$message2 = "Postovani " . $name . "\n"
. "Vaš zahtev nam je stigao. Odgovorićemo Vam u najkraćem mogućem roku" . "\n\n"
. "Vaša poruka je: " . "\n" . "'" . $_POST['message'] . "'" . "\n\n";

//Email headers
$headers = "From: " . $fromEmail; // Client email, I will receive
$headers2 = "From: " . $mailto; // This will receive client

//PHP mailer function

 $result1 = mail($mailto, $subject, $message, $headers); // This email sent to My address
 $result2 = mail($fromEmail, $subject2, $message2, $headers2); //This confirmation email to client
?>
