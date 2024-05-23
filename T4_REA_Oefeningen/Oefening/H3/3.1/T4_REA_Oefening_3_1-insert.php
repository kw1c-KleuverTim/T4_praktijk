<?php
/**
 * User: Tim Kleuver
 * Date: 2-5-2024
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

        <!--
        	-- Opdracht 0a. Pas bovenstaande module header aan
	-- (en zorg dat al je gemaakte .sql-bestanden jouw module header dragen)

	-- Opdracht 0b. Taak 1.1: backup maken van je ijdb-database: sla dat script op met je eigen module header

-- ** OPDRACHTEN VAN DEZE TAAK ** --
-- Hieronder wordt verwezen naar de INSERT-voorbeelden in de reader.

-- Opdracht 1.
-- Voer een mop in volgens Voorbeeld 1 in de reader.


-- Opdracht 2.
-- Voer drie moppen in volgens Voorbeeld 3 in de reader. Als CreateDate voer je in: jouw geboortedatum.


-- Opdracht 3.
-- Voer vier moppen in volgens Voorbeeld 4 in de reader. Als CreateDate voer je in: de exacte datum/tijd van dit moment (gebruik: GETDATE())


-- Opdracht 4  -- creëer error
-- Voer één insert in met in de VALUES minder velden dan benodigd. Kopieer de errormelding en plak die ook hier onder je query.



-- Opdracht 5  -- creëer error
-- Voer één insert in met in de VALUES meer velden dan toegestaan. Kopieer de errormelding en plak die ook hier onder je query.
        -->


        <?php
        include_once "../../../includes/dbfunctions.php";

        startConnection();

        $query = "SELECT * FROM tblRiddles WHERE Creator <> 'Admin' ";
        $query2 = "SELECT * FROM tblRiddles WHERE Creator <> 'Admin' ";

        if (isset($_GET)){
            $query2 = "INSERT INTO tblRiddles (Id, RiddleText, RiddleAnswer, Creator, CreateDate) 
VALUES
(, 101, '06-44662246', 'Eliene', 'dded'),
";
        }

        executeQuery($query);
        executeQuery($query2);

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
        echo "<strong> ID </strong>";
        echo "</td>";
        echo "<td>";
        echo "<strong> Raadsel </strong>";
        echo "</td>";
        echo "<td>";
        echo "<strong> Oplossing </strong>";
        echo "</td>";
        echo "<td>";
        echo "<strong> Bedenker </strong>";
        echo "</td>";
        echo "<td>";
        echo "<strong> Datum </strong>";
        echo "</td>";
        echo "</thead>";

        // Door de results heen loopen via een while
        while ($row = $result->fetch(PDO::FETCH_ASSOC))
        {

            echo "<tr>";
            echo "<td>";
            echo $row["Id"] . "<br>";
            echo "</td>";
            echo "<td>";
            echo  $row["RiddleText"] . "<br>";
            echo "</td>";
            echo "<td>";
            echo  $row["RiddleAnswer"] . "<br>";
            echo "</td>";
            echo "<td>";
            echo "Bedenker:" . $row["Creator"] . "<br>";
            echo "</td>";
            echo "<td>";
            echo "Datum: " . $row["CreateDate"] . "<br>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
        ?>
        <br>

        <img src="images_pokemon_deelopdracht/Schermafbeelding 2024-04-23 112498810.png" style="width: 300px; height: 400px;">
        <img src="images_pokemon_deelopdracht/Schermafbeelding 2024-04-23 1122489987.png" style="width: 400px; height: 400px;">

    </section>
</main>
<?php
include_once "../../../includes/footer.php";
?>
</body>
</html>

