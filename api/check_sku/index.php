<?php

    require_once("../../includes/class-autoload.inc.php");

    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json; charset=UTF-8");
    header('Access-Control-Allow-Methods: *');
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $method = $_SERVER['REQUEST_METHOD'];

    $product = new Products();

    if ($method == 'GET') {
        $sku = $_GET['sku'];
        $response =  $product->checkSku($sku);

        $json_response = json_encode($response);
        exit($json_response);
    }
