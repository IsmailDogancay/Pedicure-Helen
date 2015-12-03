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
        <h1>Cliënten Overzicht</h1>
        <?php
        // DB koppelen
        $db = "mysql:host=localhost;dbname=salon;port=3307";
        $user = "root";
        $pass = "usbw";
        $pdo = new PDO($db, $user, $pass);

        //Functie sorteren op id
        if (isset($_GET["id"])) {
            // voorbereiden
            $stmt = $pdo->prepare("SELECT * FROM client order by id");

            // uitvoeren
            $stmt->execute();
            print ("ID Naam Achternaam");
            while ($row = $stmt->fetch()) {
                $id = $row["id"];
                $naam = $row["naam"];
                $achternaam = $row ["achternaam"];
                print ( "<li>" . " " . "<a href=\"info.php?id=" . $id . "\"> " . "       " .
                        $row["id"] . " " . $naam . " " . $achternaam . "</a></li>");
            }
        } else {
            //Sorteren op naam
            if (isset($_GET["naam"])) {
                // voorbereiden
                $stmt = $pdo->prepare("SELECT * FROM client order by naam");

                // uitvoeren
                $stmt->execute();
                print ("ID Naam Achternaam");
                while ($row = $stmt->fetch()) {
                    $id = $row["id"];
                    $naam = $row["naam"];
                    $achternaam = $row ["achternaam"];
                    print ( "<li>" . " " . "<a href=\"info.php?id=" . $id . "\"> " . "       " .
                            $row["id"] . " " . $naam . " " . $achternaam . "</a></li>");
                }
            } else {
                // sorteren op achternaam

                if (isset($_GET["achternaam"])) {
                    // voorbereiden
                    $stmt = $pdo->prepare("SELECT * FROM client order by achternaam");

                    // uitvoeren
                    $stmt->execute();
                    print ("ID Naam Achternaam");
                    while ($row = $stmt->fetch()) {
                        $id = $row["id"];
                        $naam = $row["naam"];
                        $achternaam = $row ["achternaam"];
                        print ( "<li>" . " " . "<a href=\"info.php?id=" . $id . "\"> " . "       " .
                                $row["id"] . " " . $naam . " " . $achternaam . "</a></li>");
                    }
                } else {


                    // voorbereiden
                    $stmt = $pdo->prepare("SELECT * FROM client");

                    // uitvoeren
                    $stmt->execute();
                    print ("ID Naam Achternaam");
                    while ($row = $stmt->fetch()) {
                        $id = $row["id"];
                        $naam = $row["naam"];
                        $achternaam = $row["achternaam"];
                        print("<li>" . " " . "<a href=\"info.php?id=" . $id . "\"> " . "       " .
                                $row["id"] . " " . $naam . " " . $achternaam . "</a></li>");
                    }
                }
            }
        }




        $pdo = NULL;
        ?>
        <br><br><br>
        <form method = "GET" action = "toevoegen.php">
            <input type = "submit" name = "toevoegenn" value = "Cliënt Toevoegen"><br><br>

        </form>

        <form method="GET" action="index.php">
            Sorteer: <br>
            <input type="submit" name="id" value="Id"> <br>
            <input type="submit" name="naam" value="Naam"><br>
            <input type="submit" name="achternaam" value="Achternaam">
        </form>





    </body>
</html>
