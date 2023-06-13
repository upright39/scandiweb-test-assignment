<?php

    if (isset($_POST['sku'])) {
        require_once("class-autoload.inc.php");

        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $type = $_POST['productType'];
        $size = isset($_POST['size']) ? $_POST['size'] : "";
        $weight = isset($_POST['weight']) ? $_POST['weight'] : "";
        $height = isset($_POST['height']) ? $_POST['height'] : "";
        $width = isset($_POST['width']) ? $_POST['width'] : "";
        $length = isset($_POST['length']) ? $_POST['length'] : "";
        $details = "";

        $typeController = new Details($size, $weight, $height, $width, $length);
        $capitalizedType = ucfirst($type);
        $details = $typeController->getDetails(new $capitalizedType());

        $product = new ProductsContrl($sku, $name, $price, $type, $details);

        $product->createProduct();

        header("location: ../");
    } else {
        header("location: ../");
    }
