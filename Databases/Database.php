<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'blog_db6';
    private $username = 'root';
    private $password = '';
    public $conn;

    // الاتصال بقاعدة البيانات
    public function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        
        return $this->conn;
    }
}
?>
