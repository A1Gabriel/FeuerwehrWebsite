<?php

// Variablen $server -> Servername, $user -> Serverbenutzer zum Login, $password -> das Passwort des Benutzers, $dbname -> Datenbankname, wird nicht zur Verbindung benötigt aber muss mit angegeben werden, wenn man die Verbindung nutzen will um SQL-Abfragen an die Datenbank zu senden.
    $server = "127.0.0.1";
// $_POST['Serveruser], enthält den User root, welchen wir in dem JavaScript übergeben haben
    $user = $_POST['Serveruser'];
    $password = "";
    $dbName = "";

    // Baut die Verbindung auf und Speichert diese für weiter Server Anfragen in einer Variable ab.
    $connection = mysqli_connect($server, $user, $password, $dbName);

// Wenn die Verbindung fehl schlägt wird der Fehler an die JAvaScript Datei übergeben, bei einer Erfolgreichen Verbindung wird 'Erfolgreich!' übergeben.
    if (!$connection)
    {
        echo mysqli_connect_error;
    }
    else
    {
        echo 'Erfolgreich!';
    }

?>
