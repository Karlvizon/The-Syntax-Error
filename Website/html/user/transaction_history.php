<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve transaction history from the 'loans' table
$sql = "SELECT * FROM loans";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Transaction History</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Amount</th>
        <th>Term</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['amount']}</td>
                    <td>{$row['term']}</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No transactions found</td></tr>";
    }
    ?>
</table>

<a href="./loan_application.php">Back to Loan Application</a>

</body>
</html>

<?php
$conn->close();
?>
