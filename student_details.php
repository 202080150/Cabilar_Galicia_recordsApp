<?php
include_once("db.php"); // Include the file with the Database class

class StudentDetails {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Create a student detail entry and link it to a student
    public function create($data) {
        try {
            // Prepare the SQL INSERT statement
            $sql = "INSERT INTO student_details(student_id, contact_number, street, zip_code, town_city, province) VALUES(:student_id, :contact_number, :street, :zip_code, :town_city,:province);";
            $stmt = $this->db->getConnection()->prepare($sql);

            // Bind values to placeholders
            $stmt->bindParam(':student_id', $data['student_id']);
            $stmt->bindParam(':contact_number', $data['contact_number']);
            $stmt->bindParam(':street', $data['street']);
            $stmt->bindParam(':zip_code', $data['zip_code']);
            $stmt->bindParam(':town_city', $data['town_city']);
            $stmt->bindParam(':province', $data['province']);

            // Execute the INSERT query
            $stmt->execute();

            // Check if the insert was successful
            return $stmt->rowCount() > 0;

        } catch (PDOException $e) {
            // Handle any potential errors here
            echo "Error: " . $e->getMessage();
            throw $e; // Re-throw the exception for higher-level handling
        }
        
    }

  // Read student details by student ID
  public function read($student_id) {
    try {
        // Prepare the SQL SELECT statement
        $sql = "SELECT * FROM student_details WHERE student_id = :student_id";
        $stmt = $this->db->getConnection()->prepare($sql);

        // Bind values to placeholders
        $stmt->bindParam(':student_id', $student_id);

        // Execute the SELECT query
        $stmt->execute();

        // Fetch the result as an associative array
        return $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        // Handle any potential errors here
        echo "Error: " . $e->getMessage();
        throw $e; // Re-throw the exception for higher-level handling
    }
}

// Update student details by student ID
public function update($student_id, $data) {
    try {
        // Prepare the SQL UPDATE statement
        $sql = "UPDATE student_details SET contact_number = :contact_number, street = :street, zip_code = :zip_code, town_city = :town_city, province = :province WHERE student_id = :student_id";
        $stmt = $this->db->getConnection()->prepare($sql);

        // Bind values to placeholders
        $stmt->bindParam(':student_id', $student_id);
        $stmt->bindParam(':contact_number', $data['contact_number']);
        $stmt->bindParam(':street', $data['street']);
        $stmt->bindParam(':zip_code', $data['zip_code']);
        $stmt->bindParam(':town_city', $data['town_city']);
        $stmt->bindParam(':province', $data['province']);

        // Execute the UPDATE query
        $stmt->execute();

        // Check if the update was successful
        return $stmt->rowCount() > 0;

    } catch (PDOException $e) {
        // Handle any potential errors here
        echo "Error: " . $e->getMessage();
        throw $e; // Re-throw the exception for higher-level handling
    }
}

// Delete student details by student ID
public function delete($student_id) {
    try {
        // Prepare the SQL DELETE statement
        $sql = "DELETE FROM student_details WHERE student_id = :student_id";
        $stmt = $this->db->getConnection()->prepare($sql);

        // Bind values to placeholders
        $stmt->bindParam(':student_id', $student_id);

        // Execute the DELETE query
        $stmt->execute();

        // Check if the deletion was successful
        return $stmt->rowCount() > 0;

    } catch (PDOException $e) {
        // Handle any potential errors here
        echo "Error: " . $e->getMessage();
        throw $e; // Re-throw the exception for higher-level handling
    }
}
}
?>