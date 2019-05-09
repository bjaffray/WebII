<?php
    // Start the session
    session_start();
    $myfile = fopen("store.txt", "r") or die("Unable to open file!");

    class Item {
        // constructor
        public function __construct($name, $price, $desc, $filep, $in_cart) {
            $this->name = $name;
            $this->price = $price;
            $this->desc = $desc;
            $this->filep = $filep;
            $this->in_cart = $in_cart;
        }


        public function addToCart() {
            if ($this->in_cart)
                $this->in_cart = false;
            else
                $this->in_cart = true;
        }

    }

    $items = array();

    while(!feof($myfile)) {
        $temp = new Item(fgets($myfile), fgets($myfile), fgets($myfile), fgets($myfile), false);
        fgets($myfile);
        array_push($items, $temp);
    }

    $_SESSION['store_items'] = $items;

    fclose($myfile);
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
</head>



<body>

<div class="w3-container w3-dark-grey w3-round-xlarge w3-margin">
    <img src="Dota2.png" class="w3-round w3-margin-left" alt="Dota2"> 
    <span class="w3-xxxlarge w3-allerta">Welcome to the dota secret shop</span>
</div> 

<br> <br> <br> <br>

<div>
    <table class="w3-table w3-hoverable w3-container w3-dark-grey w3-round-xlarge w3-allerta">
        <tr>
            <th>Item</th>
            <th></th>
            <th>Description</th>
            <th>Price (Gold)</th>
            <th>Add to Cart</th>
        </tr>
        <?php
        foreach ($_SESSION['store_items'] as $to_print) {
            echo "<tr>";
            echo "<td>" . $to_print->name;
            echo "<td><img src=\"" . $to_print->filep . "\" alt=\"" . $to_print->name . "\">";
            echo "<td>" . $to_print->desc;
            echo "<td>" . $to_print->price;
            echo "<td><input type=\"checkbox\" name=\"cart\" value=\"" . $to_print->name . "\" ";
            if ($to_print->in_cart) echo "checked";
            echo "onclick=\"" . $to_print->addToCart() . "\">";
        }
        ?>
    </table>
    <input type="button" name="tocart" value="Go to Cart" class="w3-button w3-xxxlarge w3-block w3-center w3-btn w3-dark-grey w3-round-large">
</div>

</body>



</html>