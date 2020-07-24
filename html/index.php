<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <title>Die Filmdatenbank</title>
</head>
<body class="container-fluid">
    <h1>Die Filmdatenbank</h1>
    <h2>Liste aller Filme</h2>
    <ul>
        <?php
            include("db_connect.php");

            // Delete request
            if (isset($_GET["delete"])) {
                $conn->query("DELETE FROM movies WHERE mID = " . $conn->real_escape_string($_GET["delete"]) . ";");
            }

            // Create request
            if (isset($_GET["title"])) {
                $conn->query(
                    sprintf(
                        "INSERT INTO movies (title, producer, publish_date, price) VALUES (\"%s\", \"%s\", \"%s\", %f);",
                        $conn->real_escape_string($_GET["title"]),
                        $conn->real_escape_string($_GET["producer"]),
                        $conn->real_escape_string($_GET["publish_date"]),
                        $conn->real_escape_string($_GET["price"])
                    )
                );
                echo $conn->error;
            }
            
            // Render page
            $res = $conn->query("SELECT * FROM movies;");
            while ($row = $res->fetch_assoc()) {
                echo "<li>" 
                . $row["title"] 
                . " <a href=\"detail.php?mID=" . $row["mID"] . "\">Details</a>"
                . " |"
                . " <a href=\"index.php?delete=" . $row["mID"] . "\">Löschen</a>"
                . "</li>";
            }
        ?>
    </ul>
    <h2>Film hinzufügen</h2>
    <form action="index.php" method="GET">
        Titel: <input type="text" name="title">
        Produzent: <input type="text" name="producer">
        Datum der Veröffentlichung: <input type="text" name="publish_date">
        Preis: <input type="number" step="0.01" name="price">
        <input class="btn btn-primary" type="submit" value="Film hinzufügen">
    </form>
</body>
</html>