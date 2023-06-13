<?php

    abstract class ProductModel extends Database
    {
        abstract protected function getProducts();
        abstract protected function addProduct($sku, $name, $price, $type, $details);
        abstract protected function checkSku($sql);
    }

    class Products extends ProductModel
    {
        protected function getProducts()
        {
            $sql = "SELECT * FROM  products WHERE deleted = 'false' ";
            $results = $this->connect()->query($sql);
            return $results;
        }

        protected function addProduct($sku, $name, $price, $type, $details)
        {
            $sql = "INSERT INTO products (sku, name, price, types, details) VALUES (?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bind_param('sssss', $sku, $name, $price, $type, $details);

            if ($stmt->execute()) {
                return true;
            } else {
                echo "Error: " . $stmt->error;
            }
            return false;
        }

        public function delete($sql)
        {
          $this->connect()->query($sql);
        }

        public function checkSku($sku)
        {
            $sql = "SELECT * FROM products WHERE sku = ? AND deleted = 'false' ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bind_param('s', $sku);
            $stmt->execute();
            $response = $stmt->get_result();


            $result = array();

            while ($newRes = $response->fetch_array()) {
                $result[] = $newRes;
            }

            if (count($result) > 0) {
                return true;
            }

            return false;
        }
    }
