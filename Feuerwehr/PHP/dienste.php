<?php

// Variablen $server -> Servername, $user -> Serverbenutzer zum Login, $password -> das Passwort des Benutzers, $dbname -> Datenbankname, wird nicht zur Verbindung benötigt aber muss mit angegeben werden, wenn man die Verbindung nutzen will um SQL-Abfragen an die Datenbank zu senden.
$server = "127.0.0.1";
$user = "root";
$password = "";
$dbName = "feuerwehrwebsite";

// Baut die Verbindung auf und Speichert diese für weiter Server Anfragen in einer Variable ab.
$connection = mysqli_connect($server, $user, $password, $dbName);


if (isset($_POST["submit"]))
{
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $infos = $_POST["infos"];
    
    
    if ($_POST['Dienst']=="Absperrung St. Martin-Umzug"){
        $dienst = "Absperrung St. Martin-Umzug";
    }
    if ($_POST['Dienst']=="Sicherheitswache"){
        $dienst = "Sicherheitswache";
    }
    if ($_POST['Dienst']=="Parkplatzdienst"){
        $dienst = "Parkplatzdienst";
    }
    
    $statement = $connection->prepare("INSERT INTO dienste (name, email, dienst, zusatzinfos) 
                                            VALUES ('$name', '$email', '$dienst', '$infos')");
    
    if ($statement->execute()){
        header("location:../index.html");
    }else{
        echo "Datenübermittlung fehlgeschlagen.";
    }
    
}

?>