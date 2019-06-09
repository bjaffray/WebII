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
    <span class="w3-xxxlarge w3-allerta"> Registration </span>
</div> 

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="firstForm">
    


    <div class="w3-container w3-dark-grey w3-round-xlarge w3-allerta w3-center w3-border">

    <!-- We need a UserName, Password, FirstName, MidName (op), LastName, and Zip to add to the User Table -->

    <label for="usrNm">UserName:</label>
    <input type="text" name="usrNm" id="usrNm">
    <label for="pswd">Password:</label>
    <input type="text" name="pswd" id="pswd">

    <br><br>

    <label for="fName">First Name: </label>
    <input type="text" name="fName" id="fName">
    <label for="mName">Middle Name (optional): </label>
    <input type="text" name="mName" id="mName">
    <label for="lName">Last Name: </label>
    <input type="text" name="lName" id="lName">

    <br><br>

    <label for="zip">Zip:</label>
    <input type="text" name="zip" id="zip">


    <!-- Inserting query looks like this
        INSERT INTO public."User"
        ("UserName"
        ,"Password"
        ,"FirstName"
        ,"MidName"
        ,"LastName"
        ,"Zip")
        VALUES 
        ('UserName'
        ,'Password'
        ,'Test'
        ,'Mid'
        ,'Name'
        ,1111); -->






    <br><br>

    <input type="submit" name="submitReg"
            class="w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large" value="Submit">

    </div>

    <br> <br> <br> <br>
    <div class="w3-bar footer">
        <input type="submit" name="goHome" style="width:100%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Go to Homepage">
    </div>
</div> 
</form>


    
</body>
</html>