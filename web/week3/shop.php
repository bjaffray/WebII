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

        public function printTblItem() {
            echo "<tr>";
            echo "<td>" . $this->name . "<td/>";
            echo "<td><img src=\"" . $this->filep . "\" alt=\"" . $this->name . "\"><td/>";
            echo "<td>" . $this->desc . "<td/>";
            echo "<td>" . $this->price . "<td/>";
            echo "<td>" . $this->in_cart . "<td/>";
            echo "<tr/>";
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
    <table class="w3-table w3-bordered w3-container w3-dark-grey w3-round-xlarge">
        <tr>
            <th>Item</th>
            <th>Pic</th>
            <th>Description</th>
            <th>Price</th>
            <th>Is it in the cart</th>
        </tr>
        <?php
        foreach ($_SESSION['store_items'] as $to_print) {
            $to_print->printTblItem();
        }
        ?>
    </table>
</div>

</body>



</html>