<?php
//Packages
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

//if statement om de POST te checken
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $id = $_GET['ID'];

    // de klantgegevens worden gewijzigd
    $response_put = Http::asForm()->withHeaders([
        "token" => "vkXPDjtTjoccGCLqxptJevunNUKDjy",
        "Accept" => "application/json",
        "Content-Type" => "application/x-www-form-urlencoded"
    ])->put('https://assignment.sunergetic.nl/api/v1/customers/' . $id, [

        "id"              => NULL,
        "email"           => $_POST['email'],
        "firstname"       => $_POST['firstname'],
        "lastname"        => $_POST['lastname'],
        "address"         => $_POST['address'],
        "zipcode"         => $_POST['zipcode'],
        "city"            => $_POST['city'],
        "phone"           => $_POST['phone'],
        "created_at"      => NULL,
        "updated_at"      => NULL
    ]);

    echo $response_put;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="img/logo.png" />
    <title>Sunergetic</title>
    <script>
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="d-flex justify-content-center">
            <div class="container px-9">
                <a class="navbar-brand" href="/">
                    <img src="{{ URL::to('/img/logo.png') }}" width="50px" alt="">
                </a>
                <a class="navbar-brand" href="/">Sunergetic</a>
                <button onclick="topFunction()" class="btn btn-primary" title="Go to top">Top</button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                    </ul>
                </div>
            </div>
        </div>
    </nav><br><br><br>

    <!-- Section -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <div class="card text-center">
        <div class="card-header">
            <div class="card-body">
                
                <form method="POST">
                    @csrf
                    <legend>Wijzig Klant</legend>
                    <label>Email:</label>
                    <input type="email" name="email" value="{{$_GET['email']}}" required> <br><br>
                    <label>First name:</label>
                    <input type="text" name="firstname" value="{{$_GET['firstname']}}" required> <br><br>
                    <label>Last name:</label>
                    <input type="text" name="lastname" value="{{$_GET['lastname']}}" required> <br><br>
                    <label>Address:</label>
                    <input type="text" name="address" value="{{$_GET['address']}}" required> <br><br>
                    <label>Zipcode:</label>
                    <input type="text" name="zipcode" value="{{$_GET['zipcode']}}" required> <br><br>
                    <label>City:</label>
                    <input type="text" name="city" value="{{$_GET['city']}}" required> <br><br>
                    <label>Number:</label>
                    <input type="tel" name="phone" value="{{$_GET['phone']}}" required> <br><br>

                    <input type="submit" class="btn btn-primary" name="wijzigen" value="Wijzigen">
                </form>
            </div>
        </div>
    </div>
</body>

</html>