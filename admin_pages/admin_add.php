
<?php
    session_start(); // must be included for stored session variables to work

    class Admin_Add {
        private $pdo; // keep track of the pdo object used to work with our mysql database and execute queries.

        /**
        * Connect to the database. Setup pdo object
        */
        function __construct() {
            $host = '127.0.0.1';
            $db = 'car_inventory';
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
    }

    $admin_add = new Admin_Add();
?>

<script>
    function post(param) {
        var form = $('<form></form>');

        form.attr("method", "post");
        form.attr("action", "detail.php");

        
        var field = $('<input></input>');

        field.attr("type", "hidden");
        field.attr("name", "carID");
        field.attr("value", param);

        form.append(field);
        

        // The form needs to be a part of the document in
        // order for us to be able to submit it.
        $(document.body).append(form);
        form.submit();
    };
</script>

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
    
	<link href="../style.css" rel="stylesheet">

    <style>
        /*---Table---*/
        #cars {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        #cars td, #cars th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        
        #cars tr:nth-child(even){background-color: #f2f2f2;}
        
        #cars tr:hover {background-color: #ddd;}
        
        #cars th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: rgb(64,213,210);;
            color: white;
        }
    </style>
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="d-flex justify-content-center">
    <a class="navbar-brand" href="admin_index.php" >Inventory Management System - Admin</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <ul>
      
    </div>
</div>
</nav>

    
<!-- index section -->
<hr class="my-4">
<div class="container">
    
    <div style="margin-top: 25px; display: flex; justify-content: center;">
        <form action="admin_index.php" method="post">
            <p><label for="inputMake">Make:<sup>*</sup></label>
            <input type="text" name="addMake" id="inputMake" required='required'>
            </p>

            <p><label for="inputModel">Model:<sup>*</sup></label>
            <input type="text" name="addModel" id="inputModel" required='required'>
            </p>

            <p><label for="inputPrice">Price:<sup>*</sup></label>
            <input type="text" name="addPrice" id="inputPrice" required='required'>
            </p>

            <p><label for="inputColor">Color:<sup>*</sup></label>
            <input type="text" name="addColor" id="inputColor" required='required'>
            </p>

            <input type="submit" value="Submit" > <input type="reset" value="Reset">
            </form>
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


    
