<?php
// Include the database connection file
require_once('db.php');

// Check if the form is submitted for returning an item
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['return_id'])) {
    $return_id = $conn->real_escape_string($_POST['return_id']);

    // Perform the update to mark the item as returned
    $update_sql = "UPDATE borrow_history SET returned = 1 WHERE id=?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("i", $return_id);

    if ($update_stmt->execute()) {
        echo "Item returned successfully!";
    } else {
        echo "Error returning item: " . $update_stmt->error;
    }

    $update_stmt->close();
}

// Fetch and display borrow history
$sql = "SELECT * FROM borrow_history";
$result = $conn->query($sql);

if ($result) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Equipment Name</th><th>Purpose</th><th>Borrow Date</th><th>Return Date</th><th>Returned</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['equipment_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['purpose']) . "</td>";
        echo "<td>" . $row['borrow_date'] . "</td>";
        echo "<td>" . $row['return_date'] . "</td>";
        echo "<td>" . (isset($row['returned']) ? ($row['returned'] ? 'Yes' : 'No') : 'No') . "</td>";

        // Display "Return" button only for items that haven't been returned
        if (isset($row['returned']) && !$row['returned']) {
            echo "<td>";
            echo "<form action='./history.php' method='post'>";
            echo "<input type='hidden' name='return_id' value='" . $row['id'] . "'>";
            echo "<input type='submit' value='Return'>";
            echo "</form>";
            echo "</td>";
        } else {
            echo "<td>No action available</td>";
        }

        echo "</tr>";
    }
    echo "</table>";
    $result->free_result();
} else {
    echo "No records found";
}

// Close the database connection
$conn->close();
?>

<!-- Add a button to go back to index.php -->
<a href="index.php">Go Back to Index</a>
