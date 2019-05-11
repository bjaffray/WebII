<?php
class Item {
        // constructor
        public function __construct($name, $price, $desc, $filep, $in_cart) {
            $this->name = $name;
            $this->price = $price;
            $this->desc = $desc;
            $this->filep = $filep;
            $this->in_cart = $in_cart;
        }


        public function printInfo() {
            echo "Name: " . $this->name . " | Price: " . $this->price . " | Description: " . $this->desc . " | File Path: " . $this->filep . "<br>";
            echo "The cart has: " . $this->in_cart . "<br>";
        }


        public function addToCart() {
            if ($this->in_cart == 1)
                $this->in_cart = 0;
            else
                $this->in_cart = 1;
        }

    }

    function readFile() {
        $myfile = fopen("store.txt", "r") or die("Unable to open file!");
        
        $items = array();

        while(!feof($myfile)) {
            $temp = new Item(fgets($myfile), fgets($myfile), fgets($myfile), fgets($myfile), fgets($myfile));
            array_push($items, $temp);
        }

        $_SESSION['store_items'] = $items;

        fclose($myfile);
    }

    function writeFile() {

    }
?>