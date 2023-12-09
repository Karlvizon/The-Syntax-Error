<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Application Form</title>
    <link rel="stylesheet" href="./Navbar.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input {
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 16px; /* Add margin for spacing */
        }

        /* Style for the transaction history button */
        .transaction-history-button {
            background-color: #28a745;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav>
        <a href="./userhome.html">Home</a>
        <a href="./user.html">Profile</a>
        <a href="./loan_application.php">Loan</a>
        <a href="./index.php">Borrow</a>
        <a style="float: right; color: #ffcc00; cursor: pointer;" onclick="logout()">Logout</a>
    </nav>

    <div class="container">
        <h2>Loan Application Form</h2>
        <form action="process_loan.php" method="post">
            <label for="name">Full Name:</label>
            <input type="text" name="name" required>

            <label for="amount">Loan Amount:</label>
            <input type="number" name="amount" required>

            <label for="term">Loan Term (months):</label>
            <input type="number" name="term" required>

            <button type="submit">Submit Application</button>

            <!-- Button for going to the transaction history -->
            <a href="transaction_history.php" class="transaction-history-button">View Transaction History</a>
        </form>
    </div>
</body>
</html>
