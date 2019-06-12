<?php

try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

if(isset($_POST['goHome'])) {
    header("LOCATION: main.php");
} 

if(isset($_POST['findGorE'])) {
    header("LOCATION: findGorE.php");
}

if(isset($_POST['makeE'])) {
    header("LOCATION: makeE.php");
}

if(isset($_POST['register'])) {
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
    <title>Create a group or Event</title>
</head>


<body>


<div class="w3-bar w3-container w3-dark-grey w3-round-xlarge w3-margin w3-border">
    <span class="w3-bar-item w3-xxxlarge w3-allerta"> Looking For Group Finder </span>


    <?php

    // If logged in then show "Welcome $Name"

    // Else display login stuff
    require("loginBar.php");

    ?>
</div> 

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="firstForm">
    


    <div class="w3-container w3-dark-grey w3-round-xlarge w3-allerta w3-center w3-border">

        <h1>Welcome to the Group creation page for the LFG Finder</h1>

        <p>This is a is a description paragraph</p>

        <!-- We need a Name, Zip, Date(?), and Classification to add to the Group table -->



    </div>

    <br> <br> <br> <br>
    <div class="w3-bar footer">
        <input type="submit" name="makeE" style="width:33%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Make an Event">
        <input type="submit" name="findGorE" style="width:34%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Find an Event or a Group">
        <input type="submit" name="goHome" style="width:33%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Go to Homepage">
    </div>
</div> 
</form>


    
</body>
</html>