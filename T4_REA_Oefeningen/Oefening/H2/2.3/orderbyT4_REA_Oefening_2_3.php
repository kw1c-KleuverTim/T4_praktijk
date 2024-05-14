<?php
/**
 * User: Tim Kleuver
 * Date: 22-4-2024
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


        <?php
            include_once "../../../includes/dbfunctions.php";

            startConnection();

            $pdo = new PDO("odbc:odbc2sqlserver");


            $query = "SELECT * FROM country ORDER BY region";

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
            echo "Er is een probleem met ophalen van country: " . $e->getMessage();
            // Stop het script
            die();
        }
        echo "<table>";

        echo "<thead>";
        echo "<td>";
        echo "<strong> name </strong>";
        echo "</td>";
        echo "<td>";
        echo "<strong> region </strong>";
        echo "</td>";
        echo "<td>";
        echo "<strong> area </strong>";
        echo "</td>";
        echo "<td>";
        echo "<strong> population </strong>";
        echo "</td>";
        echo "<td>";
        echo "<strong> gdp </strong>";
        echo "</td>";
        echo "</thead>";

        // Door de results heen loopen via een while
        while ($row = $result->fetch(PDO::FETCH_ASSOC))
        {

            echo "<tr>";
            echo "<td>";
            echo $row["name"] . "<br>";
            echo "</td>";
            echo "<td>";
            echo $row["region"] . "<br>";
            echo "</td>";
            echo "<td>";
            echo $row["area"] . "<br>";
            echo "</td>";
            echo "<td>";
            echo $row["population"] . "<br>";
            echo "</td>";
            echo "<td>";
            echo $row["gdp"] . "<br>";
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


