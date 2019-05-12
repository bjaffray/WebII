<?php
    // Start the session
    require("Item.php");

    session_start();

    readFile();
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


<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="firstForm">
    <table class="w3-table w3-hoverable w3-container w3-dark-grey w3-round-xlarge w3-allerta w3-center">
        <tr>
            <th>Item</th>
            <th></th>
            <th>Description</th>
            <th>Price (Gold)</th>
        </tr>
        <?php
            foreach ($_SESSION['store_items'] as $temp) {
                if ($temp->in_cart == 1) {
                    echo "<tr>";
                    echo "<td>" . $temp->name;
                    echo "<td><img src=\"$temp->filep\" alt=\"$temp->name\">";
                    echo "<td>" . $temp->desc;
                    echo "<td>" . $temp->price;
                }
            }
        ?>

</table>

    <br> <br> <br> <br>
    <div class="w3-bar footer">
        <button name="toshop" class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" 
            style="width:50%" onclick="window.location='shop.php';">Go Back to Shop</button>
        <button name="tocheckout" class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" 
            style="width:50%" onclick="window.location='checkout.php';">Go to Checkout</button>
    </div> 
</div> 
<br> <br>







<br> <br> <br> <br>


</body>




</html>