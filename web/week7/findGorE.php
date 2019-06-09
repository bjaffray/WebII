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

if(isset($_POST['makeGorE'])) {
    header("LOCATION: makeGorE.php");
} 

if(isset($_POST['makeUser'])) {
    header("LOCATION: login.php");
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
    <title>Group or Event finder</title>
</head>


<body>


<div class="w3-container w3-dark-grey w3-round-xlarge w3-margin w3-border">
    <span class="w3-xxxlarge w3-allerta"> Looking For Group Finder </span>
</div> 

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="firstForm">
    
    
    <table class="w3-table w3-hoverable w3-container w3-dark-grey w3-round-xlarge w3-allerta w3-center">
        <tr>
            <th>EventID</th>
            <th>GroupID</th>
            <th>UserID</th>
            <th>Zip</th>
            <th>Classification</th>
            <th>Date</th>
        </tr>

        <?php
            foreach ($db->query('SELECT * FROM public."Event"') as $row)
            {
              echo "<tr>";
              echo "<td>" . $row["EventID"];
              echo "<td>" . $row["GroupID"];
              echo "<td>" . $row["UserID"];
              echo "<td>" . $row["Zip"];
              echo "<td>" . $row["Classification"];
              echo "<td>" . $row["Date"];
            }
        ?>

    </table>


    <br> <br> <br> <br>
    <div class="w3-bar footer">
        <input type="submit" name="makeGorE" style="width:33%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Make an Event or Group">
        <input type="submit" name="makeUser" style="width:34%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Register/Login">
        <input type="submit" name="goHome" style="width:33%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Go to Homepage">
    </div>
</div> 
</form>


    
</body>
</html>