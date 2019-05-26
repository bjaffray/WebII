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



if(isset($_POST['toGroup'])) {
    header("LOCATION: group.php");
} 

if(isset($_POST['toEvent'])) {
    header("LOCATION: event.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <title>Read Access to Database</title>
</head>




<body>

<div class="w3-container w3-dark-grey w3-round-xlarge w3-margin">
    <span class="w3-xxxlarge w3-allerta"> The User Table </span>
</div> 
    
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="firstForm">
    <table class="w3-table w3-striped w3-bordered w3-hoverable w3-container w3-dark-grey w3-round-xlarge w3-allerta w3-center">
        <tr>
            <th>UserID</th>
            <th>FirstName</th>
            <th>MidName</th>
            <th>LastName</th>
            <th>Zip</th>
        </tr>

        <?php
            foreach ($db->query('SELECT * FROM public."User"') as $row)
            {
              echo "<tr>";
              echo "<td>" . $row["UserID"];
              echo "<td>" . $row["FirstName"];
              echo "<td>" . $row["MidName"];
              echo "<td>" . $row["LastName"];
              echo "<td>" . $row["Zip"];
            }
        ?>

    </table>

    <br> <br> <br> <br>
    <div class="w3-bar footer">
        <input type="submit" name="toGroup" style="width:50%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Go to Group Table">
        <input type="submit" name="toEvent" style="width:50%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Go to Event Table">
    </div>
</div> 
</form>






</body>
</html>