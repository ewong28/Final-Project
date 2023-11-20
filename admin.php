<?php
require('connect.php');


    $query = "SELECT * FROM register";

    // A PDO::Statement is prepared from the query.
    $statement = $db->prepare($query);

    // Execution on the DB server is delayed until we execute().
    $statement->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
    <!-- Add your CSS links and styles -->
</head>
<body>

<main>
        <section class="content-section">
            <h2>Share a Story</h2>
            <form action="update_user.php" method="post">
            <?php while($row = $statement->fetch()): ?>
                    <h2><?=$row['user_id']?></h2> 
                    <h2><?=$row['username']?></h2>
                    <h2><?=$row['password_hash']?></h2>     
                    <h2><?=$row['email']?></h2>
                    <small>
                        <p><a href="edit_user.php?id=<?= $row['user_id'] ?>"> edit</a></p>
                    </small>
                    
                    <?php endwhile ?>
            </form>
        </section>
    </main>

</body>
</html>