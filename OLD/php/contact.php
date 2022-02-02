
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

    <!-- Load React. -->
    <script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
    <!-- Load Babel. -->
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

    
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
        <div id="form"></div>

    </div>

</div>

<script type="text/babel">

    class Form extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            fullname: '',
            email: '',
            message: '',
        };

        this.handleInputChange = this.handleInputChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleInputChange(event) {
        const target = event.target;
        const name = target.name;

        this.setState({
            [name]: value
        });
    }

    handleSubmit(event) {
        alert('A name was submitted: ' + this.state.value);
        event.preventDefault();
    }

    render() {
        return (
        <form action="index.php" method="post" id="contactform" onSubmit={this.handleSubmit}>
            <p>
            <label for="inputName">Name:<sup>*</sup></label>
            <input name="fullname" type="text" id="inputName" required="required" value={this.state.value} onChange={this.handleInputChange} />
            </p>

            <p>
            <label for="inputEmail">Email:<sup>*</sup></label>
            <input name="email" type="email" id="inputEmail" required="required" value={this.state.value} onChange={this.handleInputChange} />
            </p>

            <p><label for="inputMessage">Message:<sup>*</sup></label>
            <textarea form ="contactform" name="message" id="inputMessage" rows="3" cols="35" wrap="soft" required='required'
                value={this.state.value} onChange={this.handleChange}>
            </textarea>
            </p>
            
            <input type="submit" value="Submit" />
        </form>
        );
    }
    }

    ReactDOM.render(
    <Form/>,
    document.getElementById('form')
    );

</script>


      
    

    
<!--- Footer -->
<footer class="fixed-bottom">
    <div class="container-fluid padding">
                <p class="text-center">Inventory Management System</p>
    </div>
</footer>

</body>
</html>


    
