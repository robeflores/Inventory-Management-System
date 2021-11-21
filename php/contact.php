
<?php
    require_once "webpage.php";
    session_start(); // must be included for stored session variables to work

    class Contact extends Webpage{
        
    }

    $contact = new Contact();
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

    
<!-- contact section -->
<hr class="my-4">
<div class="container">

    <div style="margin-top: 25px; display: flex; justify-content: center;">
        <form action="index.php" method="post" id="contactform">

        <p><label for="inputName">Name:<sup>*</sup></label>
        <input type="text" name="name" id="inputName" required='required'>
        </p>

        <p><label for="inputName">Email:<sup>*</sup></label>
        <input type="email" name="name" id="inputName" required='required'>
        </p>

        <p><label for="inputMessage">Message:<sup>*</sup></label>
        <textarea form ="contactform" name="message" id="inputMessage" rows="3" cols="35" wrap="soft" required='required'></textarea>
        </p>


        <input type="submit" value="Submit" > <input type="reset" value="Reset">
        </form>

        <div id="like_button_container"></div>

        <!-- Load React. -->
        <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
        <script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
        <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>

        <!-- Load our React component. -->
        <script src="like_button.js"></script>

    </div>

</div>

      
    

    
<!--- Footer -->
<footer class="fixed-bottom">
    <div class="container-fluid padding">
                <p class="text-center">Inventory Management System</p>
    </div>
</footer>

</body>
</html>


    
