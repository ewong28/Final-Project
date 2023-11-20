<?php

/*******w******** 
    
    Name: Evan Wong
    Date: November 1st, 2023
    Description: 

****************/
    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: login.php");
        exit();
    }

    require('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wong's Insurance Dashboard</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <header>
        <h1>Wong's Insurance CMS</h1>
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
        <?php if ($_SESSION['loggedin'] === true) : ?>
                <!-- Check if the logged-in user's username is "ewong4" -->
                <?php if ($_SESSION['username'] === 'ewong4') : ?>
                    <!-- Display a button for user "ewong4" -->
                    <form action="admin.php" method="GET">
                        <input type="submit" value="Admin Access">
                    </form>
                <?php endif; ?>
            <?php endif; ?>
        </section>
        <form action="" method="GET">
    <label for="category">Browse by Category:</label>
    <select id="category" name="category">
        <option value="account_settings">Account Settings</option>
        <option value="main_category.php">Main</option>
    </select>
    <input type="submit" value="Go">
</form>
    </main>

    <footer>
        <p>&copy; 2023 Wong's Insurance. All rights reserved.</p>
    </footer>
</body>
</html>