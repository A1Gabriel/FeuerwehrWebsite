// Sobald die Seite komplett geladen ist können diese Functionen ausgeführt werden bzw. werden falls keine Aktivierungbedingung erhalten ist direkt ausgeführt.
$(document).ready(function () {

    // Sobald der Button mit der ID 'btnTestPHP' gedrückt wird, wird die function ohne Übergbeparameter ausgeführt.
    $('#btnTestPHP').click(function () {
        // Die Methode unten führt einen http POST-Request durch über die Jquery Lib Ajax. Es führt die PHP-Datei 'testDBConnection.php' mit Übergabeparameter 'Serveruser' aus. Und führt bei Erfolg die die function aus mit dem Übergabeprameter 'returnValue' aus (returnValue enthält die Rückgabewerte der php-Datei).
       $.post('../PHP/testDBConnection.php', { Serveruser: 'root' }).done(function (returnValue) {

            // Löscht alle HTML Elemente welche in dem Div phpOutput vorhanden sind
            $('#phpOutput').empty();
            // Hängt an das unterste HTML Element in dem Div phpOutput einfach den Rückgabewert an.
            $('#phpOutput').append(returnValue);

        });
    });
});
