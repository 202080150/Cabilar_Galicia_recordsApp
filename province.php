<?php
include_once("db.php"); // Include the Database class file

class Province {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        try {
            $sql = "SELECT * FROM province";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle errors (log or display)
            throw $e; // Re-throw the exception for higher-level handling
        }
    }
    
    public function create($data) {
        try {
            $sql = "INSERT INTO province(name, description) VALUES(:name, :description)";
            $stmt = $this->db->getConnection()->prepare($sql);

            $stmt->bindParam(':name', $data['name']);
            $stmt->bindParam(':description', $data['description']);

            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            // Handle errors (log or display)
            throw $e; // Re-throw the exception for higher-level handling
        }
    }

    public function read($province_id) {
        try {
            $sql = "SELECT * FROM province WHERE id = :province_id";
            $stmt = $this->db->getConnection()->prepare($sql);

            $stmt->bindParam(':province_id', $province_id);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle errors (log or display)
            throw $e; // Re-throw the exception for higher-level handling
        }
    }

    public function update($province_id, $data) {
        try {
            $sql = "UPDATE province SET name = :name, description = :description WHERE id = :province_id";
            $stmt = $this->db->getConnection()->prepare($sql);

            $stmt->bindParam(':province_id', $province_id);
            $stmt->bindParam(':name', $data['name']);
            $stmt->bindParam(':description', $data['description']);

            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            // Handle errors (log or display)
            throw $e; // Re-throw the exception for higher-level handling
        }
    }

    public function delete($province_id) {
        try {
            $sql = "DELETE FROM province WHERE id = :province_id";
            $stmt = $this->db->getConnection()->prepare($sql);

            $stmt->bindParam(':province_id', $province_id);

            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            // Handle errors (log or display)
            throw $e; // Re-throw the exception for higher-level handling
        }
    }
}
?>

