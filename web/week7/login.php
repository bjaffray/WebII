<?php

if(isset($_POST['makeGorE'])) {
    header("LOCATION: makeGorE.php");
} 

if(isset($_POST['goHome'])) {
    header("LOCATION: main.php");
}

if(isset($_POST['findGorE'])) {
    header("LOCATION: findGorE.php");
}

if(isset($_POST['regAccount'])) {
    header("LOCATION: Register.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <title>Login/Register</title>
</head>


<body>


<div class="w3-container w3-dark-grey w3-round-xlarge w3-margin w3-border">
    <span class="w3-xxxlarge w3-allerta"> Looking For Group Finder </span>
</div> 

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="firstForm">
    


    <div class="w3-container w3-dark-grey w3-round-xlarge w3-allerta w3-center w3-border">

        <h1>Welcome to the login page for the LFG Finder</h1>

        <h2>Login:</h2>

        UserName: <input type="text" name="UserN2" id="UserN2">

        Password: <input type="text" name="Pass2" id="Pass2">

        <br><br>

        <input type="submit" name="regAccount"
            class="w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Register">


    </div>

    <br> <br> <br> <br>
    <div class="w3-bar footer">
        <input type="submit" name="makeGorE" style="width:33%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Make an Event or Group">
        <input type="submit" name="goHome" style="width:34%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Go to Homepage">
        <input type="submit" name="findGorE" style="width:33%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Find a Event or Group">
    </div>
</div> 
</form>


    
</body>
</html>