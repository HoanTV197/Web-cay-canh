<?php
class DB
{
    private $server = 'localhost';  // Tên máy chủ MySQL
    private $username = 'root';  // Tên người dùng MySQL
    private $password = '';  // Mật khẩu MySQL
    private $database = 'websitebancay';  // Tên cơ sở dữ liệu
    private $conn;
    public function getConn()
    {
        return $this->conn;
    }
    /*----------Hàm kết nối đến csdl-------*/
    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->database);
        } catch (PDOException $e) {
            echo $e;
        }
        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }
    }
    /*----------Hàm thực thi câu truy vấn đến csdl-------*/
    public function executeSQL($sql)
    {
        $result = $this->conn->query($sql);
        return $result;
    }
    /*----------Hàm đóng kết nối đến csdl-------*/
    public function __destruct()
    {
        $this->conn->close();
    }
}
