<?php
include_once("db.php"); // Include the Database class file

class TownCity {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        try {
            $sql = "SELECT * FROM town_city";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle errors (log or display)
            throw $e; // Re-throw the exception for higher-level handling
        }
    }
     // Read a specific town/city entry by ID
     public function getById($id) {
        try {
            $sql = "SELECT * FROM town_city WHERE id = :id";
            $stmt = $this->db->getConnection()->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle errors (log or display)
            throw $e; // Re-throw the exception for higher-level handling
        }
    }

    // Update a town/city entry by ID
    public function update($id, $data) {
        try {
            $sql = "UPDATE town_city SET name = :name, population = :population WHERE id = :id";
            $stmt = $this->db->getConnection()->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $data['name']);
            $stmt->bindParam(':population', $data['population']);

            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            // Handle errors (log or display)
            throw $e; // Re-throw the exception for higher-level handling
        }
    }

    // Delete a town/city entry by ID
    public function delete($id) {
        try {
            $sql = "DELETE FROM town_city WHERE id = :id";
            $stmt = $this->db->getConnection()->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            // Handle errors (log or display)
            throw $e; // Re-throw the exception for higher-level handling
        }
    }
}
?>
