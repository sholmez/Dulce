<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'resto';
    private $username = 'root';
    private $password = 'root';
    private $conn;

    // Встановлення з'єднання з базою даних
    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Помилка з\'єднання: ' . $e->getMessage();
        }
        return $this->conn;
    }

    // Додавання даних
    public function addData($table, $data) {
        $keys = implode(", ", array_keys($data));
        $values = implode(", ", array_map(function($value) { return "'$value'"; }, array_values($data)));
        $sql = "INSERT INTO $table ($keys) VALUES ($values)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    // Видалення даних
    public function deleteData($table, $id) {
        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Оновлення даних
    public function updateData($table, $data, $id) {
        $updates = implode(", ", array_map(function($key, $value) { return "$key = '$value'"; }, array_keys($data), array_values($data)));
        $sql = "UPDATE $table SET $updates WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Відображення всіх даних
    public function getAllData($table) {
        $sql = "SELECT * FROM $table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Відображення окремої строки по ID
    public function getDataById($table, $id) {
        $sql = "SELECT * FROM $table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

class SessionManager {
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function get($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function delete($key) {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    public function clear() {
        session_unset();
        session_destroy();
    }
}