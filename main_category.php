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

    // SQL is written as a String.
    $query = "SELECT * FROM cms";

    // A PDO::Statement is prepared from the query.
    $statement = $db->prepare($query);

    // Execution on the DB server is delayed until we execute().
    $statement->execute();
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
        </ul>
    </nav>

    <main>
        <section class="content-section">
            <?php if ($_SESSION['loggedin'] === true) : ?>
                
                <?php endif; ?>
        </section>
        <form action="process_category.php" method="post">
    <label for="category">Browse by Category:</label>
    <select id="category" name="category">
        <option value="account_settings">Account Settings</option>
        <option value="main_page">Main</option>
    </select>
    <input type="submit" value="Go">
</form>
    </main>

    <footer>
        <p>&copy; 2023 Wong's Insurance. All rights reserved.</p>
    </footer>
</body>
</html>