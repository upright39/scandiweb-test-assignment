<?php

    if (isset($_POST['item'])) {
        require_once("class-autoload.inc.php");
        $selectedItems = $_POST['item'];

        $product = new ProductsContrl("", "", "", "", "");

        $product->deleteProducts($selectedItems);

         header("location: ../");
    } else {
         header("location: ../");
    }
