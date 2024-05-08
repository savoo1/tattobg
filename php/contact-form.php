<?php
$mailto = "savo436@gmail.com";  //My email address

//getting customer data
$name = $_POST['name'];
$fromEmail = $_POST['email'];
$service = $_POST['service'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$artist = $_POST['artist'];
$subject = "Kontakt sa sajta";


$subject2 = "Potvrda: Vaš zahtev je poslan tattoobeograd.rs"; // For customer confirmation

//Email body I will receive
$message = "Klijent: " . "\n" . $name . "\n\n" .
"Usluga: " . "\n" . $service . "\n\n" .
"Email: " . "\n" . $fromEmail . "\n\n" .
"Telefon: " . "\n" . $phone . "\n\n" .
"Datum: " . "\n" . $date . "\n\n" .
"Umetnik: " . "\n" . $artist . "\n\n" .
"Poruka klijenta: " . "\n" . $_POST['message'];

//Message for client confirmation
$message2 = "Postovani " . $name . "\n"
. "Vas zahtev nam je stigao. Odgovorit cemo Vam u najkraćem mogućem roku" . "\n\n"
. "Vaša poruka je: " . "\n" . "'" . $_POST['message'] . "'" . "\n\n";

//Email headers
$headers = "From: " . $fromEmail; // Client email, I will receive
$headers2 = "From: " . $mailto; // This will receive client

//PHP mailer function

 $result1 = mail($mailto, $subject, $message, $headers); // This email sent to My address
 $result2 = mail($fromEmail, $subject2, $message2, $headers2); //This confirmation email to client
?>
