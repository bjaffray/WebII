<?php
    // Start the session
    require("Item.php");

    session_start();

    if(isset($_POST['tocheckout'])) {
        header("LOCATION: checkout.php");
    } 

    if(isset($_POST['submitPayment'])) {
        //???
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
    <title>Confirmation</title>
</head>





<body>
<?php
    require("banner.php");
?>
<br> <br>







<br> <br> <br>
<div class="w3-bar footer">
    <input type="submit" name="tocheckout" style="width:50%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Go Back">
    <input type="submit" name="submitPayment" style="width:50%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Submit">
</div> 
</body>





</html>