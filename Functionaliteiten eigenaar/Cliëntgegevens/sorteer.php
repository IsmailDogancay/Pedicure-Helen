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
        if (isset($_GET["naam"])) {
            // voorbereiden
            $stmt = $pdo->prepare("SELECT * FROM client order by naam");

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
        ?>
    </body>
</html>
