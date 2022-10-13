<?php

/*
BUGS:
de pagina refresht niet en onthoud de vorige POST gegevens. Ook komt het niet gelijk in de tabel sinds het niet refresht.
alleen is het probleem dat wanneer het refresht het NOG EEN gebruiker toevoegd met de vorige POST gegevens.
dit is volgens mij een Routing probleem.
De manier om dit te voorkomen en zorgt dat het werkt is door na elke SUBMIT het logo links boven te klikken.

Ook heb ik later gevonden dat de API meerdere pages heeft, dus die moet ik ook eventjes in de tabel zetten.
*/

//Packages
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

//API GET request voor de hele lijst van customers
$response_list = Http::withHeaders([
    "token" => "vkXPDjtTjoccGCLqxptJevunNUKDjy",
    "Accept" => "application/json",
    "Content-Type" => "application/x-www-form-urlencoded"
])->get('https://assignment.sunergetic.nl/api/v1/customers')["data"];

//If statement voor als er op de submit knop wordt geklikt
if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['submit'])) {
    
    //post request to add a new user
    $response_create = Http::asForm()->withHeaders([
        "token" => "vkXPDjtTjoccGCLqxptJevunNUKDjy",
        "Accept" => "application/json",
        "Content-Type" => "application/x-www-form-urlencoded"
    ])->post('https://assignment.sunergetic.nl/api/v1/customers', [

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

    echo ($response_create);
    
}


//functie om een tabel te maken
function create_table($dataset, $from)
{

    if (is_array($dataset) && !empty($dataset)) {
        // naam van de id kolom per table
        $key = $from . "id";
        $pagename = "klanten";
?>
        <table class="table table-striped">
            <caption style="caption-side:top">
                <h2>Overzicht Klanten</h2>
            </caption>

            <?php
            // haal de keys van de array op; dit zijn de kolomnamen
            $columns = array_keys($dataset[0]);
            ?>

            <tr>
                <?php foreach ($columns as $column) { ?>
                    <th>
                        <strong>
                            {{$column}}
                        </strong>
                    </th>
                <?php } ?>
                <th colspan="2">action</th>
            </tr>
            <?php foreach ($dataset as $rows => $row) {
                $row_id = $row[$key]; ?>
                <tr>
                    <?php foreach ($row as $rowdata) { ?>
                        <td>{{$rowdata;}}</td>
                    <?php } ?>

                    <td>
                        <a href="edit-{{$pagename}}?ID={{$row_id;}}&email={{$row['email'];}}&firstname={{$row['firstname'];}}&lastname={{$row['lastname'];}}&address={{$row['address'];}}&zipcode={{$row['zipcode'];}}&city={{$row['city'];}}&phone={{$row['phone'];}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="delete-{{$pagename}}?ID={{$row_id;}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
    <?php }
        }
    } ?>
        </table>



<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="shortcut icon" href='public/img/favicon.ico' type='image/x-icon' />
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
    <br>

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
            <div class="card text-center">
                <div class="card-header">
                    <div class="card-body">

                        <form method="POST">
                            @csrf
                            <legend>Nieuw klant</legend>
                            <label>Email:</label>
                            <input type="email" name="email" required> <br><br>
                            <label>First name:</label>
                            <input type="text" name="firstname" required> <br><br>
                            <label>Last name:</label>
                            <input type="text" name="lastname" required> <br><br>
                            <label>Address:</label>
                            <input type="text" name="address" required> <br><br>
                            <label>Zipcode:</label>
                            <input type="text" name="zipcode" required> <br><br>
                            <label>City:</label>
                            <input type="text" name="city" required> <br><br>
                            <label>Number:</label>
                            <input type="tel" name="phone" required> <br><br>

                            <input type="submit" class="btn btn-primary" name="submit" value="Toevoegen">
                        </form>
                    </div>
                </div>
            </div>

            <?php
            //alle klanten worden getoond in de tabel
            create_table($response_list, '');
            ?>

</body>
</html>