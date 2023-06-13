<?php

    class ProductsContrl extends Products
    {
        private $sku;
        private $name;
        private $price;
        private $type;
        private $details;

        public function __construct($sku, $name, $price, $type, $details)
        {
            $this->sku = $sku;
            $this->name = $name;
            $this->price = $price;
            $this->type = $type;
            $this->details = $details;
        }

        public function createProduct()
        {
            $this->validate();
            $result = $this->addProduct($this->si($this->sku), $this->si($this->name), $this->si(number_format($this->price, 2), true), $this->si($this->type), $this->si($this->details));
        }

        public function deleteProducts($selectedItems)
        {
            foreach ($selectedItems as $itemId) {
                // Update the 'deleted' field to true
                $sql = "UPDATE products SET deleted = 'true' WHERE sn = $itemId";
                $this->delete($sql);
    
            }
            
        }

        private function validate()
        {
            if ($this->isEmpty()) {
                header("location: ../add-product/?error=all fields are required.");
                exit();
                return;
            }

            if ($this->checkSku($this->sku)) {
                header("location: ../add-product/?error=the sku is not unique.");
                exit();
                return;
            }
        }

        private function isEmpty()
        {
            $result = false;

            if (empty($this->sku) || empty($this->name) ||  empty($this->price) ||  empty($this->type) ||  empty($this->details)) {
                $result = true;
            }

            return $result;
        }

        private function si($data, $removeZero = false)
        {
            if($removeZero == true){
                $data = ltrim($data, "0");
            }
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
