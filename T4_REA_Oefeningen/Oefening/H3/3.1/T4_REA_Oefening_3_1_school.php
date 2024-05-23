<?php
/**
 * User: Tim Kleuver
 * Date: 21-5-2024
 * File: T3_REA_Oefening2.1.php
 */
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>
        <?php
        echo 'Realiseren instructies thema 3 en 4.';
        ?>
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/stylesheet.css" rel="stylesheet">
</head>
<body>
<?php
include_once "../../../includes/header.php";
?>
<?php
//Hier gaan we in het volgende hoofdstuk het menu toevoegen.
?>
<main id="wrapper">
    <?php
    include_once "../../../includes/navigatie.php";
    ?>
    <section>
        <h2>
            Uitwerkingen.
        </h2>
        <!-- ** OPDRACHTEN VAN DEZE TAAK ** --
        -- DENK AAN JE MODULEHEADER !!! --

-- Group By info:
-- https://www.w3schools.com/sql/sql_groupby.asp
-- Having info:
-- https://www.w3schools.com/sql/sql_having.asp
-- Soms zul je aggregate functions moeten gebruiken,
-- zoals: SUM(), MIN(), MAX(), COUNT(), AVG()
-- Zie ook W3schools voor uitleg van deze termen.


-- 1. Selecteer alle unieke plaatsnamen
--	OPMERKING: Standaard gesorteerd van A tot Z


-- 2. Selecteer alle unieke plaatsnamen en sorteer van Z tot A


-- 3. Selecteer alle gegevens waarbij je de plaats sorteert van A tot Z en de postcode van Z-A


-- 4. Bepaal het aantal scholen.

-- 5. Bepaal het aantal scholen per plaatsnaam


-- 6. Geef de kolom met het aantal de kolomnaam 'Aantal scholen'
-- Opmerking:	'' ipv [] werkt ook, maar is geen ANSI SQL, dus [] gebruiken!

-- 7. Sorteer het aantal scholen per plaats van groot naar klein


-- 8. Selecteer alle plaatsnamen waar meer dan 2 scholen zijn


-- 9. Selecteer alle postcodes en geef aan hoeveel scholen deze postcode hebben


-- 10. Selecteer alle postcodes en geef aan hoeveel scholen deze postcode hebben. Laat nu alleen de postcodes zien die meer dan 1x voorkomen.



-- 11. Bepaal hoeveel scholen van Fontys er in de database voorkomen

-->


        <?php

            include_once "../../../includes/dbfunctions.php";

            startConnection();

            $query = "SELECT * FROM school ORDER BY straatnaam";

            executeQuery($query);

        echo $query;

        // Open de database connectie en ODBC driver
        try
        {
            $pdo = new PDO("odbc:odbc2sqlserver");
        }
        catch (PDOException $e)
        {
            // Bij een error, toon dan deze melding
            echo "<h1>Database error:</h1>";
            echo $e->getMessage();
            // Stop het script
            die();
        }
        echo "database connectie gelukt<br>";
        // Uitvoeren van een SQl query
        try
        {
            // Query uitvoeren
            $result = $pdo->query($query);
        }
        catch (PDOException $e)
        {
            // Bij een error, toon dan deze melding
            echo "Er is een probleem met ophalen van tblRiddles: " . $e->getMessage();
            // Stop het script
            die();
        }


        echo "<table>";

        echo "<thead>";
        echo "<td>";
        echo "<strong> schoolID </strong>";
        echo "</td>";
        echo "<td>";
        echo "<strong> naam </strong>";
        echo "</td>";
        echo "<td>";
        echo "<strong> straatnaam </strong>";
        echo "</td>";
        echo "<td>";
        echo "<strong> huisnr </strong>";
        echo "</td>";
        echo "<td>";
        echo "<strong> huisnrToevoeging </strong>";
        echo "</td>";
        echo "<td>";
        echo "<strong> postcode </strong>";
        echo "</td>";
        echo "<td>";
        echo "<strong> plaatsnaam </strong>";
        echo "</td>";
        echo "</thead>";

        // Door de results heen loopen via een while
        while ($row = $result->fetch(PDO::FETCH_ASSOC))
        {

            echo "<tr>";
            echo "<td>";
            echo $row["schoolId"] . "<br>";
            echo "</td>";
            echo "<td>";
            echo  $row["naam"] . "<br>";
            echo "</td>";
            echo "<td>";
            echo  $row["straatnaam"] . "<br>";
            echo "</td>";
            echo "<td>";
            echo  $row["huisnr"] . "<br>";
            echo "</td>";
            echo "<td>";
            echo  $row["huisnrToevoeging"] . "<br>";
            echo "</td>";
            echo "<td>";
            echo  $row["postcode"] . "<br>";
            echo "</td>";
            echo "<td>";
            echo  $row["plaatsnaam"] . "<br>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
        ?>
        <br>

        <!--<img src="images_pokemon_deelopdracht/Schermafbeelding 2024-04-23 112498810.png" style="width: 300px; height: 400px;">
        <img src="images_pokemon_deelopdracht/Schermafbeelding 2024-04-23 1122489987.png" style="width: 400px; height: 400px;">-->

    </section>
</main>
<?php
include_once "../../../includes/footer.php";
?>
</body>
</html>


