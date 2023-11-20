<?php

require('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the entered username and password from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "Passwords do not match. Please try again.";
        exit(); // Stop further execution
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the statement to fetch the hashed password associated with the entered username
    $query = "INSERT INTO register (username, email, password_hash) VALUES (:username, :email, :password_hash)";
    $statement = $db->prepare($query);

    $statement->bindValue(':username', $username);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password_hash', $hashed_password);
        // Execute the INSERT.
    $statement->execute();

    if ($statement->execute()) {
        echo "Registration successful!";
        // Redirect to a success page or do further processing
    } else {
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Wong's Insurance</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <h1>Wong's Insurance</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="story.php">Open or Share a Story</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="signup.php">Sign Up</a></li>
        </ul>
    </nav>

    <main>
        <section class="content-section">
            <h2>Sign Up</h2>
            <form action="signup.php" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password">
                </div>
                <div class="form-group">
                    <input type="submit" value="Sign Up">
                </div>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Wong's Insurance. All rights reserved.</p>
    </footer>
</body>
</html>