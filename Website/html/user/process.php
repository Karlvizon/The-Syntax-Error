<?php

// Include the database connection file
require_once('db.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Borrow equipment
    if (isset($_POST['name'], $_POST['equipment_name'], $_POST['purpose'], $_POST['borrow_date'], $_POST['return_date'])) {
        $name = $conn->real_escape_string($_POST['name']);
        $equipment_name = $conn->real_escape_string($_POST['equipment_name']);
        $purpose = $conn->real_escape_string($_POST['purpose']);
        $borrow_date = $_POST['borrow_date'];
        $return_date = $_POST['return_date'];

        $sql = "INSERT INTO borrow_history (name, equipment_name, purpose, borrow_date, return_date) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("sssss", $name, $equipment_name, $purpose, $borrow_date, $return_date);

        if ($stmt->execute()) {
            // Redirect to the history page after successful form submission
            header("Location: ./history.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    }
}

// Delete record
if (isset($_GET['delete'])) {
    $delete_id = $conn->real_escape_string($_GET['delete']);

    $sql = "DELETE FROM borrow_history WHERE id=?";
    $stmt = $conn->prepare($sql);

    // Bind parameter
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        // Redirect to the history page after successful deletion
        header("Location: ./history.php");
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

?>
