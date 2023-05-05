<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4,
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2,
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1,
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5,
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50,
    ],

];

$parking_filter = $_GET["parking_filter"];
$vote_filter = $_GET["vote_filter"];


if (!empty($_GET['parking_filter']) && !empty($_GET['vote_filter'])) {
    
    $hotels = array_filter($hotels, function ($hotel) {
      return $hotel['parking'] && $hotel['vote'] >= $_GET['vote_filter'];
    });
  } elseif (!empty($_GET['parking_filter'])) {
    $hotels = array_filter($hotels, function ($hotel) {
      return $hotel['parking'];
    });
  } elseif (!empty($_GET['vote_filter'])) {
    $hotels = array_filter($hotels, function ($hotel) {
      return $hotel['vote'] >= $_GET['vote_filter'];
    });
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title> PHP Hotel</title>
    
</head>
<body>

    <h1 class="text-center py-3">Hotels</h1>

    <div class="container">
        <form action="" method="get">
            <div class="card p-3 w-10">
                <div class="mb-5">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" name="parking_filter" id="parking_filter" value="checkedValue" class="custom-control-input">
                      <span class="custom-control-indicator">Parking</span>
                    </label>
                </div>
                <div class="mb-5">
                    <label for="vote_filter" class="form-label">Vote</label>
                    <select class="form-select form-select-lg" name="vote_filter" id="vote_filter">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <button type="submit" name="parking_submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>



    <table class="table text-center my-5">
        <thead>
            <tr>
                <th scope="col">Hotel name</th>
                <th scope="col">Description</th>
                <th scope="col">Parking</th>
                <th scope="col">Vote</th>
                <th scope="col">Distance to center</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($hotels as $hotel): ?>
            <tr>
                <th scope="row">
                    <?=$hotel['name']?>
                </th>
                <td>
                    <?=$hotel['description']?>
                </td>
                <td>
                    <?php if ($hotel["parking"] === true) { ?>
                        <i class="fa-regular fa-circle-check text-success"></i>
                    <?php } else { ?>
                        <i class="fa-regular fa-circle-xmark text-danger"></i>
                    <?php } ?>
                </td>
                <td>
                    <?=$hotel['vote']?>
                </td>
                <td>
                    <?=$hotel['distance_to_center']?>
                </td>
            </tr>
        </tbody>
        <?php endforeach;?>
    </table>

</body>
</html>