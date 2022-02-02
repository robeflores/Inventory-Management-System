
<?php
    require_once "webpage.php";
    session_start(); // must be included for stored session variables to work

    class Detail extends Webpage{
        /**
        * display details for car
        */
        public function DisplayDetails(){
            if(isset($_POST["carID"])){

                //get details from our car database at desired ID and display its fields
                $id = $_POST["carID"];
                $stmt = $this->pdo->query("SELECT Make, Model, Price, Color FROM cars WHERE id=$id");
                $row = $stmt->fetch();

                $make = $row['Make'];
                echo "<p>Make: $make </p>";

                $model = $row['Model'];
                echo "<p>Model: $model </p>";

                $price = $row['Price'];
                echo "<p>Price: $price </p>";

                $color = $row['Color'];
                echo "<p>Color: $color </p>";

                echo "<button type='button' onclick='message()' class='btn btn-primary'>BUY</button>";
            }
        }
    }

    $detail = new Detail();
?>

<script>
function message() {
    alert("to be implemented!");
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
    
	<link href="../css/style.css" rel="stylesheet">
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="d-flex justify-content-center">
    <a class="navbar-brand" href="../index.php" >Inventory Management System</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
        <li class="nav-item">
        <a class="nav-link" href="search.php">Search</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="finance.php">Finance</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
        </li>
    <ul>
      
    </div>
</div>
</nav>

    
<!-- index section -->
<hr class="my-4">
<div class="container text-center">
    
    <?php
        //generate the car details
        $detail->DisplayDetails();
    ?>

</div>
      
    

    
<!--- Footer -->
<footer class="fixed-bottom">
    <div class="container-fluid padding">
                <p class="text-center">Inventory Management System</p>
    </div>
</footer>

</body>
</html>


    
