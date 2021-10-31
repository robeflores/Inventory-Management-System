
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
    function Calculate() {
        var bud = parseInt(document.getElementById('budgetInput').value);
        var dwnpay = parseInt(document.getElementById('dwnpayInput').value);
        var apr = parseFloat(document.getElementById('aprInput').value) / 100;
        var term = parseInt(document.getElementById('termLen').value);
        var monthlyInterest = apr / 12;
        var intAgainstPrinc = monthlyInterest * (bud - dwnpay);
        var intpow = Math.pow((1 + monthlyInterest), term);
        var intratio = 1 - (1 / intpow);
        var final = (intAgainstPrinc / intratio);
        var finalOut = final.toFixed(2);
        document.getElementById('outputAmt').innerHTML = "$" + finalOut;
        document.getElementById('budgetInput').innerHTML = bud.toFixed(2);
        document.getElementById('dwnpayInput').innerHTML = "-" + dwnpay.toFixed(2);
    }
    function loanSubmit() {
        document.getElementById('formSub').innerHTML = "Form Successfully Submitted.";
        document.getElementById('loanApp').clear();
    }
    window.onload = function(){
        Calculate();
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
<div class="container">

    <h3 class="text-center">Calculating your potential montly payments</h3>
    <br>

    <table>
    <tr>
        <td>
            <section>
                
                <table>
                    <tr>
                        <td>
                            Vehicle Budget:
                        </td>
                        <td>
                            <input type="text" name="budgetInput" id="budgetInput" onchange="Calculate()" value="14000" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Down Payment:
                        </td>
                        <td>
                            <input type="text" name="dwnpayInput" id="dwnpayInput" onchange="Calculate()" value="2000" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            APR:
                        </td>
                        <td>
                            <input type="range" id="aprInput" name="aprInput" min="0.1" max="20" step="0.1" oninput="this.nextElementSibling.value = this.value" onchange="Calculate()" /><output>0.1</output>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Term Length:
                        </td>
                        <td>
                            <select type="" name="termLen" id="termLen" onchange='Calculate()' />
                            <option value="12"> 12 Month</option>
                            <option value="24"> 24 Month</option>
                            <option value="36"> 36 Month</option>
                            <option value="48"> 48 Month</option>
                            <option value="60"> 60 Month</option>
                            <option value="72"> 72 Month</option>
                        </td>
                    </tr>
                </table>
            </section>
        </td>
   
        
        <td>
            <section id="summary">
                <p>
                Your Monthly Payment is expected to be:
                <label name="outputAmt" id="outputAmt"> </label>
                </p>
            </section>
        </td>
    </tr>

</table>
</br>
<hr />
</br>
<section id="financeInfo">
    Be sure to plan for the future! While our calculator can help in planning how to get you into the vehicle of your dreams,
    make certain that the full cost of owning a vehicle is accounted for. You should account for insurance and maintanence costs for
    your vehicle when determining your budget.
</section>
</br>
<hr />
</br>
<section id="loanApplication">
    Interested in applying for a loan through us or one of our trusted partners? No sweat! Just fill out the form below and you'll be well on you way!
    
    <div style="margin-top: 25px; display: flex; justify-content: center;">
        <form>
        <p><label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" />
        </p>

        <p>
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" />
        </p>

        <p>
            <label for="bday">Birthdate:</label>
            <input type="date" id="bday" name="bday" />
        </p>

        <p>
            <label for="homeAdd">Home Address:</label>
            <input type="text" id="homeAdd" name="homeAdd" />
        </p>

        <p>
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" />
        </p>

        <p>
            <label for="income">Monthly Income:</label>
            <input type="text" id="income" name="income" />
        </p>

            <input type="submit" />
        </form>
    </div>
 
     
</section>


</div>
      
    

    
<!--- Footer -->
<footer class="fixed-bottom">
    <div class="container-fluid padding">
                <p class="text-center">Inventory Management System</p>
    </div>
</footer>

</body>
</html>


    
