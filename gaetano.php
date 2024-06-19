<?php
//dati hotels
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

//ricerca

$has_parking = !empty($_GET['has-parking']); //true / false
$has_vote = !empty($_GET['vote']); //bool
$vote = intval($_GET['vote'] ?? '0'); //int

//ricerca per parcheggio
if ($has_parking) {
    $temp_hotels = [];

    foreach ($filtered_hotels as $hotel) {
        if ($hotel['parking'] === true) {
            $temp_hotels[] = $hotel;
            // array_push($temp_hotels, $hotel);
        }
    }

    $filtered_hotels = $temp_hotels;
}

//ricerca per voto
if ($has_vote) {

    $temp_hotels = [];

    foreach ($filtered_hotels as $hotel) {
        if ($hotel['vote'] >= intval($vote)) {
            $temp_hotels[] = $hotel;
            // array_push($temp_hotels, $hotel);
        }
    }

    $filtered_hotels = $temp_hotels;
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotels</title>
    <!-- bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- /bootstrap -->

</head>

<body>

    <header>
        <div class="container text-center p-3">
            <h1>Hotels</h1>
        </div>

    </header>

    <main>
        <!-- lista hotel -->
        <div class="container  p-3">


            <section id="hotels-search">
                <form action="index.php" method="GET">
                    <div class="row align-items-center">

                        <div class="col-auto">
                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" id="has-parking" name="has-parking" value="1" <?php if ($has_parking) : ?> checked <?php endif; ?>>

                                <label class=" form-check-label" for="has-parking">
                                    Solo hotels con parcheggio
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <select class="form-select form-select-sm" name="vote">
                                <option selected value="">Qualunque voto</option>
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <option value="<?php echo $i; ?>" <?php if ($vote === $i) : ?> selected <?php endif; ?>>Voto: <?php echo $i; ?></option>
                                <?php endfor; ?>

                            </select>
                        </div>
                        <div class=" col">
                            <button class="btn btn-primary btn-sm">Cerca</button>
                        </div>

                    </div>
                </form>
            </section>


            <hr>

            <section id="hotels-list">
                <?php if (count($filtered_hotels)) : ?>
                    <!-- versione tabella -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Descrizione</th>

                                <th scope="col">Voto</th>
                                <th scope="col">Parcheggio</th>
                                <th scope="col">Distanza</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($filtered_hotels as $hotel) : ?>
                                <td><?php echo $hotel['name']; ?></td>
                                <td><?php echo $hotel['description']; ?></td>

                                <td><?php echo $hotel['vote']; ?></td>
                                <td><?php echo $hotel['parking'] ? 'si' : 'no'; ?></td>
                                <td><?php echo $hotel['distance_to_center']; ?> km</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- /versione tabella -->
                <?php else : ?>
                    <div class="alert alert-info" role="alert">
                        Nessun hotel trovato
                    </div>
                <?php endif; ?>
            </section>
        </div>
        <!-- /lista hotel -->
    </main>

    <footer>
        <div class="container text-center p-3">
            Hotels by classe 126
        </div>
    </footer>

</body>

</html>