<!-- php -->

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


$filtered_hotels = $hotels;
// ISSET parking se esiste true altrimenti false
$parking = !empty($_GET['parking']);

if ($parking) {
    $paking_yes = [];
    foreach ($filtered_hotels as $hotel) {
        if ($hotel['parking'] === true) {
            $parking_yes[] = $hotel;
            // come fare array_push($parking_yes, $hotel);
        }
    }
    $filtered_hotels = $parking_yes;
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

    <head>

        <h1 class="text-center py-5 text-success fw-semibold">PHP-HOTELS</h1>
    </head>
    <div class="container">
        <!-- form parking -->
        <form class="py-2" method='GET' action="index.php">
            <label for="parking">Parking</label>
            <input name="parking" id="parking" type="checkbox" <?php if ($parking) : ?> checked <?php endif; ?>>
            <!-- se $parking è popolato allora la chek rimane checked -->

            <button class="btn btn-success">INVIA</button>


        </form>
        <!-- / -->
        <section id="hotel-list">
            <!-- se array è popolato mostra risultati altrimenti mostra hotel non trovato -->
            <?php if (count($filtered_hotels)) : ?>
                <!-- table hotels -->
                <table class="table table-striped border border-dark table-success text-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Parking</th>
                            <th>Vote</th>
                            <th>Distance_to_center</th>
                        </tr>

                    </thead>

                    <tbody>
                        <!-- ciclo for each -->
                        <?php foreach ($filtered_hotels as $hotel) : ?>
                            <tr>
                                <td><?php echo $hotel['name']; ?></td>
                                <td><?php echo $hotel['description']; ?></td>
                                <!-- operatore ternario -->
                                <td><?php echo $hotel['parking'] ? 'si' : 'no'; ?></td>
                                <td><?php echo $hotel['vote']; ?></td>
                                <td><?php echo $hotel['distance_to_center']; ?> km</td>
                            </tr>


                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <div class="alert alert-info">
                    hotel trovati: 0.
                </div>
            <?php endif; ?>
            <!-- / -->
        </section>
        <footer class="text-center py-3">
            <p>
                visita il sito internet <a href="/">www.php-hotels.com</a>
            </p>
        </footer>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>