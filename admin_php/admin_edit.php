
<?php
    require_once "../php/webpage.php";
    session_start(); // must be included for stored session variables to work

    class Admin_Edit extends Webpage{
        /**
        * display form to edit
        */
        public function EditForm(){
            if(isset($_POST["carID"])){
                
                
                $id = $_POST["carID"];
                $stmt = $this->pdo->query("SELECT Make, Model, Price, Color FROM cars WHERE id=$id");
                $this->row = $stmt->fetch();

                echo "<form action='../admin_index.php' method='post'>";

                echo "<input type='hidden' name='editID' value=$id required='required'>";
                
                $make = $this->row['Make'];
                echo "<p><label for='makeInput'>Make:</label>";
                echo "<input type='text' name='editMake' id='makeInput' value=$make required='required'>";
    
                echo "<p><label for='modelInput'>Model:</label>";
                $model = $this->row['Model'];
                echo "<input type='text' name='editModel' id='modelInput' value=$model required='required'>";
    
                echo "<p><label for='priceInput'>Price:</label>";
                $price = $this->row['Price'];
                echo "<input type='text' name='editPrice' id='priceInput' value=$price required='required'>";

                echo "<p><label for='colorInput'>Color:</label>";
                $color = $this->row['Color'];
                echo "<input type='text' name='editColor' id='colorInput' value=$color required='required'>";

                echo "<p> <input type='submit' value='Save changes' > <input type='reset' value='Reset'> </p>";
                echo "</form>";
            }
        }

        public function DeleteForm(){
            if(isset($_POST["carID"])){
                $id = $_POST["carID"];
                echo "
                        <form action='../admin_index.php' method='post'>
                            <button type='submit' name='deleteID' value='$id' class='btn btn-danger mt-2'>Remove car from database</button>
                        </form>
                    ";
            }
        }
    }

    $admin_edit = new Admin_Edit();
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
    <a class="navbar-brand" href="../admin_index.php" >Inventory Management System - Admin</a>

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
    <?php
        $admin_edit->EditForm();
    ?>
    </div>

    <div style="margin-top: 100px; display: flex; justify-content: center;">
    <?php
        $admin_edit->DeleteForm();
    ?>
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


    
