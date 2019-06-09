<?php

if(isset($_POST['makeGorE'])) {
    header("LOCATION: makeGorE.php");
} 

if(isset($_POST['makeUser'])) {
    header("LOCATION: login.php");
}

if(isset($_POST['findGorE'])) {
    header("LOCATION: findGorE.php");
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
    <title>Looking For Group Finder</title>
</head>


<body>


<div class="w3-bar w3-container w3-dark-grey w3-round-xlarge w3-margin w3-border">
    <span class="w3-bar-item w3-xxxlarge w3-allerta"> Looking For Group Finder </span>

    <div class="w3-bar-item login-container">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" placeholder="Username" name="username">
            <input type="text" placeholder="Password" name="psw">
            <button type="submit" name="login">Login</button>
            <button type="submit" name="register">Register</button>
        </form>
    </div>
</div> 

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="firstForm">
    


    <div class="w3-container w3-dark-grey w3-round-xlarge w3-allerta w3-center w3-border">

        <h1>Welcome to the main page for the LFG Finder</h1>

        <br><br>

        <p>Welcome to the looking for group finder. This is a site you will be able to look for groups in your local area
            in order to engage in groups or events that may be taking place in your area. The idea is to join people and 
            make friends with people who have similar interests and have groups to have a more interesting adult life</p>

        <br><br>

        <img src="lfgpic.png" alt="Looking for group Picture" style="max-width: 500px; max-height: 500px;">

        <br><br>


    </div>

    <br> <br> <br> <br>
    <div class="w3-bar footer">
        <input type="submit" name="makeGorE" style="width:33%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Make an Event or Group">
        <input type="submit" name="makeUser" style="width:34%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Register/Login">
        <input type="submit" name="findGorE" style="width:33%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Find a Event or Group">
    </div>
</div> 
</form>


    
</body>
</html>