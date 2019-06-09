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

function insertUser($usrNm, $pswd, $fName, $mName, $lName, $zip) {
    // prepare statement for insert
    $sql = 'INSERT INTO public."User"("UserName","Password","FirstName","MidName","LastName","Zip") VALUES(:usrNm, :pswd, :fName, :mName, :lName, :zip)';
    $stmt = $this->pdo->prepare($sql);
    
    // pass values to the statement
    $stmt->bindValue(':usrNm', $usrNm);
    $stmt->bindValue(':pswd', $pswd);
    $stmt->bindValue(':fName', $fName);
    $stmt->bindValue(':mName', $mName);
    $stmt->bindValue(':lName', $lName);
    $stmt->bindValue(':zip', $zip);
    
    // execute the insert statement
    $stmt->execute();
    
    // return generated id
    return $this->pdo->lastInsertId('user_id_seq');
}

if(isset($_POST['goHome'])) {
    header("LOCATION: main.php");
} 

if(isset($_POST['submit'])) {
    // INSERT INTO public."User"
    // ("UserName","Password","FirstName","MidName","LastName","Zip")
    // VALUES ('UserName','Password','Test','Mid','Name',1111);

    $usrName = htmlentities($_POST['usrNm']);
    $pswd = htmlentities($_POST['pswd']);
    $fName = htmlentities($_POST['fName']);
    $mName = htmlentities($_POST['mName']);
    $lName = htmlentities($_POST['lName']);
    $zip = htmlentities($_POST['zip']);

    insertUser($usrNm, $pswd, $fName, $mName, $lName, $zip);


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

    <br>
    <h1>Registration page</h1>
    <br>

    <label for="usrNm">UserName:</label>
    <input type="text" name="usrNm" id="usrNm">
    <label for="pswd">Password:</label>
    <input type="text" name="pswd" id="pswd">

    <br><br>

    <label for="fName">First Name: </label>
    <input type="text" name="fName" id="fName">
    <br>
    <label for="mName">Middle Name: </label>
    <input type="text" name="mName" id="mName" placeholder="Optional">
    <br>
    <label for="lName">Last Name: </label>
    <input type="text" name="lName" id="lName">

    <br><br>

    <label for="zip">Zip:</label>
    <input type="text" name="zip" id="zip">

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