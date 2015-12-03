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
        //DB koppelen
        $db = "mysql:host=localhost;dbname=salon;port=3307";
        $user = "root";
        $pass = "usbw";
        $pdo = new PDO($db, $user, $pass);

        // opslaan
        if (isset($_GET["opslaan"])) {
            $stmt = $pdo->prepare("UPDATE client SET naam=?,  achternaam=?, woonplaats=?, adres=?, postcode=?, telefoonnr=?, email=?, geslacht=?, gebdatum=?, beroep=?, huisarts=? WHERE id=?");
            $stmt->execute(array($_GET["naam"], $_GET["achternaam"], $_GET["woonplaats"], $_GET["adres"], $_GET["postcode"], $_GET["telefoonnr"], $_GET["email"], $_GET["geslacht"], $_GET["gebdatum"], $_GET["beroep"], $_GET["huisarts"], $_GET["id"]));
            $stmt2 = $pdo->prepare("UPDATE verzekering SET verzekering=?,  verzekeringnr=?, verzekeringsoort=? WHERE id=?");
            $stmt2->execute(array($_GET["verzekering"], $_GET["verzekeringnr"], $_GET["verzekeringsoort"], $_GET["id"]));
            print ("Wijzigingen van " . $_GET["naam"] . " " . $_GET["achternaam"] . " opgeslagen! <br>");
        }

        $stmt = $pdo->prepare("SELECT * FROM client WHERE id=?");
        $stmt->execute(array($_GET["id"]));
        $row = $stmt->fetch();
        $stmt2 = $pdo->prepare("SELECT * FROM verzekering WHERE id=?");
        $stmt2->execute(array($_GET["id"]));
        $row2 = $stmt2->fetch();

        $pdo = NULL;
        ?>

        <form method="GET" action="wijzigen.php">
            ID: <input type="text" name="id" value="<?php print( $row["id"]); ?>" autocomplete="off" size="4" disabled=""> <br>
            Naam: <input type="text" name="naam" autocomplete="off"  value="<?php print($row["naam"]); ?>"> <br>
            Achternaam:  <input type="text" name="achternaam" autocomplete="off"  value="<?php print($row["achternaam"]); ?>"><br>
            Woonplaats: <input type="text" name="woonplaats" autocomplete="off"  value="<?php print($row["woonplaats"]); ?>"> <br>
            Adres:  <input type="text" name="adres" autocomplete="off"  value="<?php print($row["adres"]); ?>"><br>
            Postcode: <input type="text" name="postcode" autocomplete="off"  value="<?php print($row["postcode"]); ?>"> <br>
            Telefoonnr:  <input type="text" name="telefoonnr" autocomplete="off"  value="<?php print($row["telefoonnr"]); ?>"><br>
            E-mail: <input type="text" name="email" autocomplete="off"  value="<?php print($row["email"]); ?>"> <br>
            Geslacht:  <input type="text" name="geslacht" autocomplete="off"  value="<?php print($row["geslacht"]); ?>"><br>
            Geb-datum: <input type="text" name="gebdatum" autocomplete="off"  value="<?php print($row["gebdatum"]); ?>"> <br>
            Beroep:  <input type="text" name="beroep" autocomplete="off"  value="<?php print($row["beroep"]); ?>"><br>
            Huisarts: <input type="text" name="huisarts" autocomplete="off"  value="<?php print($row["huisarts"]); ?>"> <br>
            Verzekering:  <input type="text" name="verzekering" autocomplete="off"  value="<?php print($row2["verzekering"]); ?>"><br>
            Verzekeringnr: <input type="text" name="verzekeringnr" autocomplete="off"  value="<?php print($row2["verzekeringnr"]); ?>"><br>
            Verzekeringsoort: <input type="text" name="verzekeringsoort" autocomplete="off"  value="<?php print($row2["verzekeringsoort"]); ?>"><br>
            <input type="submit" name="opslaan" value="Opslaan">
            <input type="hidden" name="id" value="<?php print($row["id"]); ?>">
            <input type="hidden" name="id" value="<?php print($row2["id"]); ?>">
        </form>
        <br>

        <?php print ("<a href=\"info.php?id=" . $row["id"] . "\">Terug</a>"); ?>
    </body>
</html>
