<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YouTube Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #results {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .video {
            width: 300px;
        }

        .video img {
            max-width: 100%;
        }

        .video-title {
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>YouTube Search</h1>
    <form method="get" action="">
        <input type="text" name="query" placeholder="Search for videos" />
        <button type="submit">Search</button>
    </form>
    <br /><br />
    <div id="results">
        <?php
        if (isset($_GET['query'])) {
            $query = urlencode($_GET['query']);
            $apiKey = 'AIzaSyD5gepbAuuzjZGSrIqwWK7RfUPPk5yMj5w';
            $apiUrl = "https://www.googleapis.com/youtube/v3/search?key=$apiKey&q=$query&type=video&part=snippet";

            $response = file_get_contents($apiUrl);
            $data = json_decode($response, true);



            if (!empty($data['items'])) {
                foreach ($data['items'] as $video) {
                    $videoId = $video['id']['videoId'];
                    $title = htmlspecialchars($video['snippet']['title']);
                    $thumbnail = $video['snippet']['thumbnails']['medium']['url'];
                    echo "<div class='video'>
                                <a href='https://www.youtube.com/watch?v=$videoId' target='_blank'>
                                    <img src='$thumbnail' alt='$title'>
                                    <div class='video-title'>$title</div>
                                </a>
                            </div>";
                }
            } else {
                echo "<p>No results found.</p>";
            }
        }
        ?>
    </div>
</body>

</html>