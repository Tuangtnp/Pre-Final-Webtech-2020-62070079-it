<?php
    error_reporting(0);
    $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";    
    $reponse = file_get_contents($url);
    $result = json_decode($reponse);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz 2</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-2 mt-2">
                <h5>ระบุการค้นหา</h5>
                <form  method="POST">
                    <input class="form-control" style="width:80%; display:inline-block" name="searching">
                    </input>
                    <button class="btn btn-primary rounded">Submit</button>
                </form>
            </div>
            <?php
                $search = $_POST["searching"];
                if ($search == null) {
                    for ($i = 0; $i < count($result->tracks->items); $i++) {
                        echo    '<div class="col-md-4 mb-4">
                                    <div class="card border">
                                        <img class="card-img-top" src="'. $result->tracks->items[$i]->album->images[0]->url .'">
                                        <h5 class="m-3">'. $result->tracks->items[$i]->album->name .'</h5>
                                        <h6 class="m-3"> Artist: '. $result->tracks->items[$i]->album->artists[0]->name .'</h6>
                                        <h6 class="m-3"> Release date: '. $result->tracks->items[$i]->album->release_date .'</h6>
                                        <h6 class="m-3"> Avaliable : '. count($result->tracks->items[$i]->available_markets) .'</h6>
                                    </div>
                                </div>';
                    }
                }
            ?>
        </div>
    </div>
</body>

</html>