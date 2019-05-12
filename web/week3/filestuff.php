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
        $myfile = fopen("store.txt", "w") or die("Unable to open file!");

        foreach($_SESSION['store_items'] as $output) {
            fwrite($myfile, $output->name . "\n");
            fwrite($myfile, $output->price . "\n");
            fwrite($myfile, $output->desc . "\n");
            fwrite($myfile, $output->filep . "\n");
            fwrite($myfile, $output->in_cart . "\n");
        }

        fclose($myfile);
    }

    function clearCartTotaly() {
        $myfile = fopen("store.txt", "w") or die("Unable to open file!");

        foreach($_SESSION['store_items'] as $output) {
            fwrite($myfile, $output->name . "\n");
            fwrite($myfile, $output->price . "\n");
            fwrite($myfile, $output->desc . "\n");
            fwrite($myfile, $output->filep . "\n");
            fwrite($myfile, "0\n");
        }

        fclose($myfile);
    }

?>