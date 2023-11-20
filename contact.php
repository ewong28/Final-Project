<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
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
    <?php if ($_SESSION['loggedin'] === true) : ?>
                
                <?php endif; ?>
        <section class="content-section">
            <h2>Contact Us</h2>
            <form>
                <div class="input-group">
                    <label for="first-name">First Name:</label>
                    <input type="text" id="first-name" name="first-name" placeholder="Enter your first name">
                </div>
                <div class="input-group">
                    <label for="last-name">Last Name:</label>
                    <input type="text" id="last-name" name="last-name" placeholder="Enter your last name">
                </div>
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email">
                </div>
                <div class="input-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" placeholder="Type your message here"></textarea>
                </div>
                <button type="submit">Submit</button>
            </form>
        </section>

        <section class="content-section">
            <h2>Call Us</h2>
            <p>Call us for any inquiries or assistance related to our insurance products and services.</p>
            <p>Call 204-230-1611</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Wong's Insurance. All rights reserved.</p>
    </footer>
</body>
</html>