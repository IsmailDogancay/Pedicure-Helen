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
        $pdo = new PDO("mysql:host=localhost;dbname=salon;port=3307", "root", "usbw");
        $stmt = $pdo->prepare("DELETE FROM client WHERE id=?");
        $stmt->execute(array($_GET["id"]));
        $pdo = NULL;


        print("Cliënt " . $_GET["id"] . " is verwijderd");
        ?>
        <br>
        <br>
        <br>
        <form method = "GET" action = "index.php">
            <input type = "submit" name = "terug" value = "Terug naar het overzicht">

        </form>
//halloooo test
    </body>
</html>
