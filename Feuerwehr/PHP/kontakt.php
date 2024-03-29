<?php
//send_email.php

if (isset($_POST["submit"]))
{

$email_from = $_POST["email"];   //Absender falls keiner angegeben wurde
$sendermail_antwort = true;      //E-Mail Adresse des Besuchers als Absender. false= Nein ; true = Ja
$name_von_emailfeld = $_POST["email"];   //Feld in der die Absenderadresse steht

$empfaenger = "antoniagabriel25@gmail.com"; //Empfänger-Adresse
$betreff = $_POST["betreff"]; //Betreff der Email




//Diese Felder werden nicht in der Mail stehen
$ignore_fields = array('submit');

echo $email_from;
echo $betreff;


//Datum, wann die Mail erstellt wurde
$name_tag = array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");
$num_tag = date("w");
$tag = $name_tag[$num_tag];
$jahr = date("Y");
$n = date("d");
$monat = date("m");
$time = date("H:i");

//Erste Zeile unserer Email
$msg = ":: Gesendet am $tag, den $n.$monat.$jahr - $time Uhr ::\n\n";

//Hier werden alle Eingabefelder abgefragt
foreach($_POST as $name => $value) {
    if (in_array($name, $ignore_fields)) {
        continue; //Ignore Felder wird nicht in die Mail eingefügt
    }
    $msg .= "::: $name :::\n$value\n\n";
}

echo $msg;

//E-Mail Adresse des Besuchers als Absender
if ($sendermail_antwort and isset($_POST[$name_von_emailfeld]) and filter_var($_POST[$name_von_emailfeld], FILTER_VALIDATE_EMAIL)) {
    $email_from = $_POST[$name_von_emailfeld];
}



$mail_senden = mail($empfaenger, $betreff, $msg);


//Weiterleitung, hier konnte jetzt per echo auch Ausgaben stehen
if($mail_senden){
    echo "versendet";
    exit();
} else{
    echo "nicht versendet";
    exit();
}
}
?>
