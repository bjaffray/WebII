<?php
    // Start the session
    require("Item.php");

    session_start();

    //We need a street line 1/2
    //  City, State, Zip

    if(isset($_POST['toCart'])) {
        header("LOCATION: cart.php");
    } 

    if(isset($_POST['toConf'])) {

        $_SESSION['street1'] = htmlentities($_POST['str1']);
        $_SESSION['street2'] = htmlentities($_POST['str2']);
        $_SESSION['city'] = htmlentities($_POST['city']);
        $_SESSION['state'] = htmlentities($_POST['state']);
        $_SESSION['zip'] = htmlentities($_POST['zip']);

        header("LOCATION: confirmation.php");
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
    <title>Checkout</title>
</head>




<body>
<?php
    require("banner.php");
?>
<br> <br>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="secondForm">
    <div class="w3-table w3-hoverable w3-container w3-dark-grey w3-round-xlarge w3-allerta w3-center">
        <h1>Put in Address details:</h1>
        <br>
        Street Address: <br>
        <input type="text" name="str1" id="str1"> <br>
        Street Address 2: <br>
        <input type="text" name="str2" id="str2"> <br>

        City <br>
        <input type="text" name="city" id="city"> <br>
        State <br>
        <input type="text" name="state" id="state"> <br>
        Zip <br>
        <input type="text" name="zip" id="zip"> <br><br><br><br>
    </div>



    <div class="w3-bar footer">
        <input type="submit" name="toCart" style="width:50%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Go Back to the Cart">
        <input type="submit" name="toConf" style="width:50%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Submit">
    </div> 

</form>
</body>



</html>