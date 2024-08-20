<?php
require_once './../Databases/Database.php';

class Post {
    private $conn;
    private $table = 'posts';

    // الخصائص
    public $id;
    public $title;
    public $content;
    public $author;
    public $created_at;
    public $updated_at;

    // الباني (constructor)
    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // إنشاء مقالة جديدة
    public function create() {
        $query = "INSERT INTO " . $this->table . " (title, content, author) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sss', $this->title, $this->content, $this->author);
        
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // قراءة مقالة حسب المعرف
    public function read($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // تحديث مقالة
    public function update() {
        $query = "UPDATE " . $this->table . " SET title = ?, content = ?, author = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sssi', $this->title, $this->content, $this->author, $this->id);
        
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // حذف مقالة
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $this->id);
        
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // عرض جميع المقالات
    public function listAll() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
