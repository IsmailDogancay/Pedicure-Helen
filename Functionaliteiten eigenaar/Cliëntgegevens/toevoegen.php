<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cliënt Toevoegen</title>
    </head>
    <body>
        <h1>Cliënt Toevoegen</h1>
        <?php
        //DB koppelen
        $db = "mysql:host=localhost;dbname=salon;port=3307";
        $user = "root";
        $pass = "usbw";
        $pdo = new PDO($db, $user, $pass);


        // Toevoegen als daar op is geklikt
        if (isset($_GET["toevoegen"])) {

            if ($_GET["id"] AND $_GET["naam"] AND $_GET["achternaam"] AND $_GET["woonplaats"] AND $_GET["adres"] AND $_GET["postcode"] AND $_GET["telefoonnr"] AND $_GET["email"] AND $_GET["geslacht"] AND $_GET["gebdatum"] AND $_GET["beroep"] AND $_GET["huisarts"] AND $_GET["verzekeringnr"] AND $_GET["verzekering"] AND $_GET["verzekeringsoort"]) {
                //aangeven waar het toegevoegd wordt
                $stmt = $pdo->prepare("INSERT INTO client (id, naam, achternaam, woonplaats, adres, postcode, telefoonnr, email, geslacht, gebdatum, beroep, huisarts) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");

                //toevoegen aan tabel verzekering
                $stmt2 = $pdo->prepare("INSERT INTO verzekering (id, verzekeringnr, verzekering, verzekeringsoort) VALUES(?,?,?,?)");
                //uitvoeren
                $stmt->execute(array($_GET["id"], $_GET["naam"], $_GET["achternaam"], $_GET["woonplaats"], $_GET["adres"], $_GET["postcode"], $_GET["telefoonnr"], $_GET["email"], $_GET["geslacht"], $_GET["gebdatum"], $_GET["beroep"], $_GET["huisarts"]));
                $stmt2->execute(array($_GET["id"], $_GET["verzekeringnr"], $_GET["verzekering"], $_GET["verzekeringsoort"]));
                print ($_GET["naam"] . " " . $_GET["achternaam"] . " is toegevoegd. <br>");
            } else {
                if ($_GET["id"] == "" OR $_GET["naam"] == "" OR $_GET["achternaam"] == "") {
                    print ("Vul alle gegevens in!");
                }
            }
        }






        $pdo = NULL;
        ?>

        <form method="get" action="toevoegen.php">
            ID  <input type="text" name="id" autocomplete="off"  size="4"> <br>
            Naam <input type="text" name="naam" autocomplete="off" > <br>
            Achternaam <input type="text" name="achternaam" autocomplete="off" ><br>
            Woonplaats <input type="text" name="woonplaats" autocomplete="off" > <br>
            Adres <input type="text" name="adres" autocomplete="off" ><br>
            Postcode <input type="text" name="postcode" autocomplete="off" ><br>
            Telefoonnr  <input type="text" name="telefoonnr" autocomplete="off" > <br>
            E-mail <input type="text" name="email" autocomplete="off" ><br>
            Geslacht <input type="text" name="geslacht" autocomplete="off" ><br>
            Geb-datum <input type="text" name="gebdatum" autocomplete="off"  placeholder="vb. 1990-01-01"> <br>
            Beroep <input type="text" name="beroep" autocomplete="off" ><br>
            Huisarts <input type="text" name="huisarts" autocomplete="off" ><br>
            Verzekeringnr  <input type="text" name="verzekeringnr" autocomplete="off" > <br>
            Verzekering <input type="text" name="verzekering" autocomplete="off" ><br>
            Verzekeringsoort <input type="text" name="verzekeringsoort" autocomplete="off" ><br><br>
            <input type="submit" name="toevoegen" autocomplete="off"  value="Toevoegen">


        </form>
        <br> <br>
        <form method = "GET" action = "index.php">
            <input type = "submit" name = "terug" value = "Terug">

        </form>

    </body>
</html>
