<?php
    // Start the session
    session_start();
    $myfile = fopen("store.txt", "r") or die("Unable to open file!");

    class Item {
        // constructor
        public function __construct($name, $price, $desc, $filep) {
            $this->name = $name;
            $this->price = $price;
            $this->desc = $desc;
            $this->filep = $filep;
        }

        public function printInfo() {
            echo "Name = " . $this->name . " | Price = " . $this->price . " | Description = " . $this->desc . " | File Path = " . $this->filep . "\n";
        }

    }

    $items = array();

    while(!feof($myfile)) {
        $temp = new Item(fgets($myfile), fgets($myfile), fgets($myfile), fgets($myfile));
        fgets($myfile);
        array_push($items, $temp);
    }

    $_SESSION['store_items'] = $items;

    fclose($myfile);


    foreach ($_SESSION['store_items'] as $toprint) {
        echo $toprint->name;
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
</head>



<body>

<div class="w3-container w3-dark-grey w3-round-xlarge w3-margin-top w3-margin-left w3-margin-right">
    <img src="Dota2.png" class="w3-round w3-margin-left" alt="Dota2"> 
    <span class="w3-xxxlarge w3-margin-top w3-allerta">Welcome to the dota secret shop</span>
</div> 







</body>



</html>