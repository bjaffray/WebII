<?php
    // Start the session
    session_start();
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
    <title>Cart</title>
</head>





<body>
<?php
    require("banner.php");
?>


<div class="w3-container w3-dark-grey w3-round-xlarge w3-margin">
    <?php   
    echo "Size: " . sizeof($_SESSION['store_items']);
    // foreach ($_SESSION['store_items'] as $value) {
    //     echo "Item ";
    //     $value->printInfo();
    // }
    ?>
</div>



</body>




</html>