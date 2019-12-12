<?php

// Variablen $server -> Servername, $user -> Serverbenutzer zum Login, $password -> das Passwort des Benutzers, $dbname -> Datenbankname, wird nicht zur Verbindung benötigt aber muss mit angegeben werden, wenn man die Verbindung nutzen will um SQL-Abfragen an die Datenbank zu senden.
$server = "127.0.0.1";
// $_POST['Serveruser], enthält den User root, welchen wir in dem JavaScript übergeben haben
$user = "root";//$_POST['Serveruser'];
$password = "";
$dbName = "feuerwehrwebsite";


SESSION_START();

// Baut die Verbindung auf und Speichert diese für weiter Server Anfragen in einer Variable ab.
$connection = mysqli_connect($server, $user, $password, $dbName);


// Wenn die Verbindung fehl schlägt wird der Fehler an die JAvaScript Datei übergeben, bei einer Erfolgreichen Verbindung wird 'Erfolgreich!' übergeben.
if (!$connection)
{
    echo 'Fehler!';
}
else
{
    echo 'Erfolgreich!';
}


    
    # Ist die $_POST Variable username nicht leer ???
    # dann wurden Logindaten eingegeben, die m�ssen wir �berpr�fen !
      if (isset($_POST["username"]))
    {
        
        $_username = $_POST["username"];
        $_password = $_POST["password"];
       
        # Befehl f�r die MySQL Datenbank      
        # Pr�fen, ob der User in der Datenbank existiert !
        
        $sql = mysqli_query($connection, "SELECT * FROM mitglieder WHERE benutzername 
                                    = '$_username' and passwort = '$_password' Limit 1");

        # Die Anzahl der gefundenen Eintr�ge �berpr�fen. Maximal
        # wird 1 Eintrag rausgefiltert (LIMIT 1). Wenn 0 Eintr�ge
        # gefunden wurden, dann gibt es keinen Usereintrag, der
        # g�ltig ist. Keinen wo der Username und das Passwort stimmt        
        $row = mysqli_num_rows($sql);
        
        if($row > 0){
            include("../mitglieder.html");
        }else{
            echo "Login fehlgeschlagen";
        }
        
    
    }
    
?>    