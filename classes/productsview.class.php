<?php

    class ProductsView extends Products
    {
        private $products = array();

        public function showProducts()
        {
            $result = $this->getProducts();

            while ($row = $result->fetch_assoc()) {
                $this->products[] = $row;
            }

            return $this->products;
        }
    }
