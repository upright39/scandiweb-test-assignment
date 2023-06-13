<?php

    class Database
    {
        protected $conn;
        private $username = "root";
        private $host = "localhost";
        private $password = "";
        private $db_name = "test";

        protected function connect()
        {
            try {
                $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
                return $this->conn;
            } catch (\Throwable $th) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }
    }

    