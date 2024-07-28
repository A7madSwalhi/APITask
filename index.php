<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon Search</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .pokemon-img {
            width: 150px;
            height: 150px;
        }
        .pokemon-card {
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="GET" action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search for Pokémon" name="search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
                <div id="result" class="d-flex flex-wrap justify-content-center">
                    <?php
                    if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
                        $input = htmlspecialchars($_GET['search']);
                        $response1 = file_get_contents("https://pokeapi.co/api/v2/pokemon?limit=1000");
                        $jsonRes1 = json_decode($response1, true);

                        if (isset($jsonRes1['results'])) {
                            foreach ($jsonRes1['results'] as $pokemon) {
                                if (stripos($pokemon['name'], $input) === 0) {
                                    $response = file_get_contents($pokemon['url']);
                                    $jsonRes = json_decode($response, true);
                                    if (!empty($jsonRes['sprites']['front_default'])) {
                                        echo '<div class="card pokemon-card">';
                                        echo '<img src="' . htmlspecialchars($jsonRes['sprites']['front_default']) . '" class="card-img-top pokemon-img" alt="' . htmlspecialchars($pokemon['name']) . '">';
                                        echo '<div class="card-body">';
                                        echo '<h5 class="card-title text-center">' . htmlspecialchars($pokemon['name']) . '</h5>';
                                        echo '</div></div>';
                                    }
                                }
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
