
<?php
    session_start(); // must be included for stored session variables to work

    class Index {
        private $pdo; // keep track of the pdo object used to work with our mysql database and execute queries.

        /**
        * Connect to the database. Setup pdo object
        */
        function __construct() {
            $host = '127.0.0.1';
            $db = 'jazzfusion_artists';
            $user = 'root';
            $pass = '';
            $charset = 'utf8';
            $dsn = "mysql:host=$host; dbname=$db; charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->pdo = new PDO($dsn, $user, $pass, $opt);
        }

        function myFunc(){
            
        }
    }

    $index = new Index();
?>

<script>
    //prevents refreshing and duplicate form submissions
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>

    <!-- import jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- import bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
	<link href="style.css" rel="stylesheet">
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="d-flex justify-content-center">
    <a class="navbar-brand" href="index.php" >Inventory Management System</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
        <li class="nav-item">
        <a class="nav-link" href="#">Search</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="#">Finance</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="#">About</a>
        </li>
    <ul>
      
    </div>
</div>
</nav>

    
<!-- index section -->
<hr class="my-4">
<div class="container">
    <img src="carsforsale.jpg" class="rounded mx-auto d-block" style="max-width: 33%;">

    <ul>
        <li>Search for a car to buy</li>
        <li>Acquire financing</li>
        <li>About us</li>
        <li>Contact us</li>
    </ul>
</div>
      
    

    
<!--- Footer -->
<footer class="fixed-bottom">
    <div class="container-fluid padding">
                <p class="text-center">Inventory Management System</p>
    </div>
</footer>

</body>
</html>


    
