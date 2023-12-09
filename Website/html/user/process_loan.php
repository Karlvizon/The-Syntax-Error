<?php
// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form
$name = $_POST['name'];
$amount = $_POST['amount'];
$term = $_POST['term'];

// Insert data into the 'loans' table
$sql = "INSERT INTO loans (name, amount, term) VALUES ('$name', $amount, $term)";

if ($conn->query($sql) === TRUE) {
    echo "Loan application submitted successfully! <br>";

    // Add a "Done" button to go back to the loan application
    echo '<button onclick="goBack()">Done</button>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!-- JavaScript function to go back to the loan application -->
<script>
    function goBack() {
        window.history.back();
    }
</script>
