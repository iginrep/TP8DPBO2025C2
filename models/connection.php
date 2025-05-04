<?php

class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "tp_mvc";
    public $conn;

    // Fungsi konstruktor untuk menginisialisasi koneksi database
    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Fungsi untuk menjalankan query SQL
    public function query($sql)
    {
        $result = $this->conn->query($sql);
        if ($this->conn->error) {
            die("Query failed: " . $this->conn->error);
        }
        return $result;
    }

    // Fungsi untuk mempersiapkan query SQL
    public function prepare($sql)
    {
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: " . $this->conn->error);
        }
        return $stmt;
    }

    // Fungsi untuk menutup koneksi database
    public function close()
    {
        $this->conn->close();
    }
}
