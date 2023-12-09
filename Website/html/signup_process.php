<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["signup_email"];
    $password = $_POST["signup_password"];
    $confirmPassword = $_POST["confirm_password"];

    // Basic validation (you should implement more robust validation)
    if (empty($email) || empty($password) || empty($confirmPassword)) {
        echo "Please fill in all fields.";
    } elseif ($password !== $confirmPassword) {
        echo "Passwords do not match.";
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
            // User already exists
            echo "User with this email already exists.";
        } else {
            // Hash the password before saving it to the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user into the database using prepared statement
            $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $email, $hashed_password);

            if ($stmt->execute()) {
                echo "Signup successful for user: $email";
                // Use JavaScript to redirect to the login page
                echo "<script>alert('Registration successful for user: $email');";
                echo "window.location.href = 'login.html';</script>";
            } else {
                echo "Error: " . $stmt->error;
            }
        }

        $stmt->close();
        $conn->close();
    }
}
?>
