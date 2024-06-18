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

// parking yes

$new_array = [];
$parking = isset($_GET['parking']) ? $_GET['parking'] : '';

foreach ($hotels as $hotel) {
    if ($parking == 'on') {
        if ($hotel['parking'] == true)
            array_push($new_array, $hotel);
    } else
        array_push($new_array, $hotel);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-hotels</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center py-5 text-success fw-semibold">PHP-HOTELS</h1>
    <div class="container">
        <form class="py-2" method='GET' action="">
            <label for="parking">Parking</label>
            <input name="parking" id="parking" type="checkbox">

            <button>INVIA</button>


        </form>
        <table class="table border border-dark table-success text-center">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Parking</th>
                <th>Vote</th>
                <th>Distance_to_center</th>
            </tr>
            <?php
            foreach ($new_array as $hotel) {
                echo "<tr>";
                foreach ($hotel as $key => $value) {
                    // se parking = true mostro 'si'
                    if ($key == 'parking' && $value == true)
                        echo "<td>si</td>";
                    else if ($key == 'parking' && $value == false)
                        echo "<td>no</td>";
                    else if ($key == 'distance_to_center')
                        echo "<td>{$value} km</td>";
                    else
                        echo "<td>{$value}</td>";
                }
            }

            ?>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>