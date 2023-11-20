<?php
session_start();

require('connect.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the entered username and password from the form
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    // Prepare the statement to fetch the hashed password associated with the entered username
    $query = "SELECT password_hash FROM register WHERE username = :username";
    $statement = $db->prepare($query);

    $statement->bindValue(':username', $enteredUsername);
        // Execute the INSERT.
    $statement->execute();

    // Fetch the result
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        
        $storedHashedPassword = $row["password_hash"];
        
        if (password_verify($enteredPassword, $storedHashedPassword)) {
            echo "Login successful! Welcome";

            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $enteredUsername;
        } else {
            echo "Invalid username or password. Please try again.";
        }
    } else {
        echo "Invalid username or password. Please try again.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Wong's Insurance</title>
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
            <h2>Login</h2>
            <?php if (isset($error_message)) : ?>
                 <p><?php echo $error_message; ?></p>
            <?php endif; ?>
            <form action="login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>

                <input type="submit" value="Login">
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Wong's Insurance. All rights reserved.</p>
    </footer>
</body>
</html>