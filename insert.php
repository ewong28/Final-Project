<?php

require("connect.php");

// Sanitize user input to escape HTML entities and filter out dangerous characters.
$user  = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// Build the parameterized SQL query and bind sanitized values to the parameters
$query     = "INSERT INTO cms (user, content) values (:user, :content)";
$statement = $db->prepare($query);
$statement->bindValue(':user', $user);
$statement->bindValue(':content', $content);

// Execute the INSERT prepared statement.
$statement->execute();

// Determine the primary key of the inserted row.
$insert_id = $db->lastInsertId();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Wong's Insurance CMS</title>
</head>
<body>
    <?= header("Location: story.php?id={$id}"); ?>
    
</body>
</html>