<?php

require('connect.php');

if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $query = "SELECT * FROM register WHERE user_id = :user_id";

    $statement = $db->prepare($query);        
    $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT);

    $statement->execute();
    $value_user = $statement->fetch();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wong's Insurance Dashboard</title>
    <link rel="stylesheet" href="main.css">
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
            <form action="update_user.php" method="post">
                <input type="hidden" name="user_id" value="<?= $value['user_id']?>">
                <div class="input-group">
                    <label for="username">User:</label>
                    <input name="username" id="username" value="<?= $value['username'] ?>"/>
                </div>
                <div class="input-group">
                    <label for="password_hash">Password:</label>
                    <input name="password_hash" id="password_hash" value="<?= $value['password_hash'] ?>"/>
                </div>
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input name="email" id="email" value="<?= $value['email'] ?>"/>
                </div>
                <input type="submit" name="confirm" value="Update">
                <input type="submit" name="confirm" value="Delete" onclick="return confirm('Are you sure you want to delete?')"/>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Wong's Insurance. All rights reserved.</p>
    </footer>
</body>
</html>