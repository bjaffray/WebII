<?php
    // Start the session
    require("Item.php");

    session_start();

    require("filestuff.php");
    readItemFile();

    if(isset($_POST['submit'])) {
        $items = array();

        foreach ($_SESSION['store_items'] as $key=>$to_check) {
            if ($_POST["cart$key"] == "1") {
                $to_check->addToCart();
            }
        }

        writeItemFile();
        header("LOCATION: cart.php");
    } 

    if(isset($_POST['clearCart'])) {
        //clearCartTotaly();
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
    <title>Shop</title>

    <script>
    
    function checkInfo(address)
    {
        var temp = document.getElementById(address);

        if (!temp.checked)
            temp.checked = true;
        else
            temp.checked = false;
    }
    
    
    </script>
</head>



<body>

<?php
require("banner.php");
?>

<br> <br>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="firstForm">
    <table class="w3-table w3-hoverable w3-container w3-dark-grey w3-round-xlarge w3-allerta w3-center">
        <tr>
            <th>Item</th>
            <th></th>
            <th>Description</th>
            <th>Price (Gold)</th>
            <th>Items in Cart</th>
        </tr>
        <?php
        for ($i = 0; $i < sizeof($_SESSION['store_items']) - 1; $i++) {
            $to_print = $_SESSION['store_items'][$i];
            echo "<tr onclick=\"checkInfo($i)\">";
            echo "<td>" . $to_print->name;
            echo "<td><img src=\"$to_print->filep\" alt=\"$to_print->name\">";
            echo "<td>" . $to_print->desc;
            echo "<td>" . $to_print->price;
            echo "<td><input type=\"checkbox\" name=\"cart$i\" id=\"$i\" value=\"1\"";
            if ($to_print->in_cart == 1) echo "checked";
            echo " >";
        }
        ?>
    </table>

    <br> <br> <br> <br>
    <div class="w3-bar footer">
        <input type="submit" name="submit" style="width:50%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Go to Cart">
        <input type="button" name="clearCart" style="width:50%"
            class="w3-bar-item w3-button w3-xlarge w3-block w3-btn w3-dark-grey w3-round-large w3-border" value="Clear cart">
    </div>
</div> 
</form>

</body>



</html>