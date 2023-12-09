<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Basic validation (you should implement more robust validation)
    if (empty($email) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password_db = "";
        $dbname = "website"; // Update with your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password_db, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Use prepared statement to protect against SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User found
            $row = $result->fetch_assoc();
            $hashed_password = $row["password"];

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // Password is correct
                echo "Login successful for user: $email";

                // Redirect to the dashboard directory
                header("Location: user/user.html");
                exit();
            } else {
                // Password is incorrect
                echo "Incorrect password.";
            }
        } else {
            // User not found
            echo "User not found.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
