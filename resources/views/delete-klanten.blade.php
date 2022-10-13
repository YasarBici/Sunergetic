<?php
//Packages
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

$id = $_GET['ID'];
if (isset($id)) {

    //API DELETE request om een gebruiker te verwijderen
    $response_delete = Http::withHeaders([
        "token" => "vkXPDjtTjoccGCLqxptJevunNUKDjy",
        "Accept" => "application/json",
        "Content-Type" => "application/x-www-form-urlencoded"
    ])->delete('https://assignment.sunergetic.nl/api/v1/customers/' . $id);

    echo $response_delete;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
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

<body id="page-top">
    
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
    <section class="navbar navbar-expand-lg navbar-dark bg-success" style="border: 5px; border-style: solid; border-color: lime;" id="services">
        <div class="d-flex justify-content-center">
            <div class="container px-9">
                <div>
                    <div>
                        <form action="/" method="post">
                            @csrf
                            <h1 style="color: white;">Gebruiker verwijderd</h1>
                            <input type="submit" name="back" value="Go Back" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>