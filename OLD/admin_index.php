
<?php
    require_once "php/webpage.php";
    session_start(); // must be included for stored session variables to work

    class Admin_Index extends Webpage {

        public function Update(){
            //editing entry with id in database
            if(isset($_POST["editID"])){
                $sql = "UPDATE cars SET Make=?, Model=?, Price=?, Color=? WHERE id=?";
                $stmt= $this->pdo->prepare($sql);
                $stmt->execute([ $_POST["editMake"], $_POST["editModel"], $_POST["editPrice"], $_POST["editColor"], $_POST["editID"] ]);
            }
            //adding to database
            else if(isset($_POST["addMake"])){
                $sql = "INSERT INTO cars (Make, Model, Price, Color) VALUES (?, ?, ?, ?)";
                $stmt= $this->pdo->prepare($sql);
                $stmt->execute([ $_POST["addMake"], $_POST["addModel"], $_POST["addPrice"], $_POST["addColor"] ]);
            }
            //deleting from database
            else if(isset($_POST["deleteID"])){
                $sql = "DELETE FROM cars WHERE id=?";
                $stmt= $this->pdo->prepare($sql);
                $stmt->execute([ $_POST["deleteID"] ]);
            }
        }

        /**
        * display table of cars
        */
        public function DisplayTable(){
            $sql = " SELECT * FROM cars ";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            
            echo "
            <table id='cars'>
                <tr>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Color</th>
                </tr>
            ";

            //display each record that is in the user's watched list to a row in the html table
            $result = $stmt->fetchAll();
            foreach( $result as $row ) {
                $id = $row["ID"];

                echo "<tr onclick='post($id)' style='cursor: pointer;'>";

                //make column
                $make = $row["Make"];
                echo "<td> $make </td>";

                //model column
                $model = $row["Model"];
                echo "<td> $model </td>";

                //price column
                $price = $row["Price"];
                echo "<td> $price </td>";

                //color column
                $color = $row["Color"];
                echo "<td> $color </td>";



                echo "</tr>";
            }
            echo "</table>";
        }
    }

    $admin_index = new Admin_Index();
    $admin_index->Update();
?>

<script>
    function post(param) {
        var form = $('<form></form>');

        form.attr("method", "post");
        form.attr("action", "admin_php/admin_edit.php");

        
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
    
	<link href="css/style.css" rel="stylesheet">

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
    
    <?php
        //generate the table
        $admin_index->DisplayTable();
    ?>

    <br>
    <button type='button' class='btn btn-primary' onclick="document.location='admin_php/admin_add.php'">Add new car</button>

</div>
      
    

    
<!--- Footer -->
<footer class="fixed-bottom">
    <div class="container-fluid padding">
                <p class="text-center">Inventory Management System</p>
    </div>
</footer>

</body>
</html>


    
