<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Show Pokémon Picture</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        img {
            border: 2px solid red;
            width: 300px;
        }
    </style>
</head>

<body>
    <form method="get" action="">
        <div>

            <input type="text" name="name" placeholder="Enter Pokémon name" />
            <button type="submit">Show Picture</button>
    </form>
    </div>

    <br /><br />
    <?php
    if (isset($_GET['name'])) {

        $name = htmlspecialchars($_GET['name']);
        $apiUrl = "https://pokeapi.co/api/v2/pokemon-form/" . urlencode($name);

        $response = file_get_contents($apiUrl);
        echo $response;
        if ($response !== FALSE) {
            $data = json_decode($response, true);
            echo "<pre>";
            print_r($data);
            echo "</pre>";
            if (isset($data['sprites']['front_shiny'])) {
                $imageUrl = $data['sprites']['front_shiny'];
                echo "<img src='$imageUrl' alt='$name' />";
            } else {
                echo "<p>Image not found for Pokémon: $name</p>";
            }
        } else {
            echo "<p>Invalid Pokémon name: $name</p>";
        }
    }
    ?>
</body>

</html>