<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

$parking = $_GET["parking"] ?? "false";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>php hotel</title>
</head>

<body>
    <h1>Hotels</h1>

    <form action="./index.php" method="get">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="parking" value="true" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Only hotels with parking
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <!-- <select class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select> -->
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Parking</th>
                <th scope="col">Vote</th>
                <th scope="col">Distance to center</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo $parking;

            $hotels_filtered;

            if ($parking == "true") {
                $hotels_filtered = array_filter($hotels, function ($hot) {
                    return $hot["parking"] == true;
                });
            } else {
                $hotels_filtered = array_filter($hotels);
            }

            // var_dump($hotels_filtered);

            $counter = 1;
            foreach ($hotels_filtered as $hotel) {
                echo '<tr><th scope="row">' . $counter . '</th>';
                foreach ($hotel as $key => $val) {
                    if (gettype($val) == "boolean") {
                        if ($val == true) {
                            echo "<td>&#10004;</td>";
                        } else {
                            echo "<td>&#10008;</td>";
                        }
                    } else {
                        echo "<td>$val</td>";
                    }
                }
                echo "</tr>";
                $counter++;
            }
            ?>
        </tbody>
    </table>

</body>

</html>