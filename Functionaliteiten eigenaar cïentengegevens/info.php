<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //DB Koppelen
        $db = "mysql:host=localhost;dbname=salon;port=3307";
        $user = "root";
        $pass = "usbw";
        $pdo = new PDO($db, $user, $pass);

        // voorbereiden
        $stmt = $pdo->prepare("SELECT * FROM client WHERE id = ?");
        $stmt2 = $pdo->prepare("SELECT * FROM verzekering WHERE id = ?");

        // uitvoeren gegevens ophalen van tabel client
        if (isset($_GET["id"])) {
            $stmt->execute(array($_GET["id"]));
            while ($row = $stmt->fetch()) {
                $id = $row["id"];
                $naam = $row["naam"];
                $achternaam = $row["achternaam"];
                $woonplaats = $row["woonplaats"];
                $adres = $row["adres"];
                $postcode = $row["postcode"];
                $telefoonnr = $row["telefoonnr"];
                $email = $row["email"];
                $geslacht = $row["geslacht"];
                $gebdatum = $row["gebdatum"];
                $beroep = $row["beroep"];
                $huisarts = $row["huisarts"];

                print
                        ("<li>" . "ID: " . $id . "<br>" . "Naam: " . $naam . "<br>" . "Achternaam: " . $achternaam . "<br>" . "Woonplaats: " . $woonplaats . "<br>" . "Adres: " . $adres . "<br>" . "Postcode: " . $postcode . "<br>" . "Telefoonnr: " . $telefoonnr . "<br>" . "E-mail: " . $email . "<br>" . "Geslacht: " . $geslacht . "<br>" . "Geb-datum: " . $gebdatum . "<br>" . "Beroep: " . $beroep . "<br>" . "Huisarts: " . $huisarts . "<br>" . "</li>");
            }
            // uitvoeren gegevens ophalen van tabel verzekering
            $stmt2->execute(array($_GET["id"]));
            while ($row = $stmt2->fetch()) {
                $id = $row["id"];
                $verzekeringnr = $row["verzekeringnr"];
                $verzekering = $row["verzekering"];
                $verzekeringsoort = $row["verzekeringsoort"];


                print
                        ("<li>" . "Verzekering: " . $verzekering . "<br>" . "Verzekeringnr: " . $verzekeringnr . "<br>" . "Verzekeringsoort: " . $verzekeringsoort . "<br>");
            }
        } else {
            print("Er is geen klant-id opgegeven.");
        }
        $pdo = NULL;
        ?>
        <br>
        <?php
        print("<a href=\"verwijder.php?id=" . $id . "\">Verwijder</a>");
        print ("<br>");
        print ("<a href=\"wijzigen.php?id=" . $id . "\">Wijzigen</a>");
        ?>


        <br><br><br>
        <form method = "GET" action = "index.php">
            <input type = "submit" name = "terug" value = "Terug">

        </form>


    </body>
</html>
