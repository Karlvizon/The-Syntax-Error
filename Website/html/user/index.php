<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Borrowing Form</title>
    <link rel="stylesheet" href="./Navbar.css"> <!-- Replace with the actual path once you have the file -->
    <script src="../logout.js" defer></script>
</head>
<body>
    <style>
        /* style.css */

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

h2 {
    text-align: center;
    color: #333;
}

form {
    max-width: 400px;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form label {
    display: block;
    margin-bottom: 8px;
}

form input,
form textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
}

form input[type="submit"] {
    background-color: #333;
    color: #fff;
    cursor: pointer;
}

button {
    background-color: #333;
    color: #fff;
    padding: 10px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    margin-top: 10px;
}

button:hover {
    background-color: #555;
}

    </style>
<nav>
        <a href="./userhome.html">Home</a>
        <a href="./user.html">Profile</a>
        <a href="./loan_application.php">Loan</a>
        <a href="./index.php">Borrow</a>
        <a style="float: right; color: #ffcc00; cursor: pointer;" onclick="logout()">Logout</a>
</nav>



<h2>Equipment Borrowing Form</h2>

<form action="./process.php" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <label for="equipment_name">Equipment Name:</label>
    <input type="text" name="equipment_name" required><br>

    <label for="purpose">Purpose:</label>
    <textarea name="purpose" rows="4" required></textarea><br>

    <label for="borrow_date">Borrow Date:</label>
    <input type="date" name="borrow_date" required><br>

    <label for="return_date">Return Date:</label>
    <input type="date" name="return_date" required><br>

    <input type="submit" value="Borrow">
</form>

<!-- Button to navigate to the history page -->
<button onclick="window.location.href='./history.php'">View Borrow History</button>

</body>
</html>
