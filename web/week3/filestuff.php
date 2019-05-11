<?php
    function readItemFile() {
        $myfile = fopen("store.txt", "r") or die("Unable to open file!");
        
        $items = array();

        while(!feof($myfile)) {
            $temp = new Item(fgets($myfile), fgets($myfile), fgets($myfile), fgets($myfile), fgets($myfile));
            array_push($items, $temp);
        }

        $_SESSION['store_items'] = $items;

        fclose($myfile);
    }

    function writeItemFile() {
        $myfile = fopen("storewrite.txt", "w") or die("Unable to open file!");

        foreach($_SESSION['store_items'] as $output) {
            echo $output->name . "\n";
            echo $output->price . "\n";
            echo $output->desc . "\n";
            echo $output->filep . "\n";
            echo $output->in_cart . "\n";
        }

        fclose($myfile);
    }

?>