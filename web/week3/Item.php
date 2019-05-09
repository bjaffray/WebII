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
        }


        public function addToCart() {
            if ($this->in_cart)
                $this->in_cart = false;
            else
                $this->in_cart = true;
        }

    }
?>