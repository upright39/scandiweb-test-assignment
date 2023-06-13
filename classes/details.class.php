<?php

    interface ProductType
    {
        public function setProperties($size, $weight, $height, $width, $length);
    }

    class Dvd implements ProductType
    {
        public function setProperties($size, $weight, $height, $width, $length)
        {
            return "Size : $size MB";
        }
    }

    class Book implements ProductType
    {
        public function setProperties($size, $weight, $height, $width, $length)
        {
            return "Weight : $weight"."KG";
        }
    }

    class Furniture implements ProductType
    {
        public function setProperties($size, $weight, $height, $width, $length)
        {
            return "Dimension : ".$height."x".$width."x".$length;
        }
    }

    class Details
    {
        private $size;
        private $weight;
        private $height;
        private $width;
        private $length;

        public function __construct($size, $weight, $height, $width, $length)
        {
            $this->size = ltrim($size, "0");
            $this->weight = ltrim($weight, "0");
            $this->height = ltrim($height, "0");
            $this->width = ltrim($width, "0");
            $this->length = ltrim($length, "0");
        }

        public function getDetails(ProductType $type)
        {
            return $type->setProperties($this->size, $this->weight, $this->height, $this->width, $this->length);
        }
    }
