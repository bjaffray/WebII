<?php



if(isset($_POST['toGroup'])) {
    header("LOCATION: group.php");
} 

if(isset($_POST['toUser'])) {
    header("LOCATION: user.php");
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
    <span class="w3-xxxlarge w3-allerta"> The Event Table </span>
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
        // We need php calling the database and filling the info
        ?>

    </table>

    <br> <br> <br> <br>
    <div class="w3-bar footer">
        <input type="submit" name="toUser" style="width:50%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Go to User Table">
        <input type="submit" name="toGroup" style="width:50%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Go to Group Table">
    </div>
</div> 
</form>






</body>
</html>