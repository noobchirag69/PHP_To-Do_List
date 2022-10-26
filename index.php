<!-- PHP -->
<?php
    include('config/db_connect.php'); 
    $sql = 'SELECT * FROM `todo` ORDER BY `created_at`';
    $result = mysqli_query($conn, $sql); 
    $todo = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
?>

<!-- HTML --> 
<!DOCTYPE html>
<html lang="en">
    
<!-- Header and CSS -->
<link rel="stylesheet" href="styles\style.css">
<?php include('./templates/header.php'); ?>

    <!-- Main -->
    <main>
        <div class="main-header">
            <h1>Tasks</h1>
            <a href="create.php" id="add-task">Add +</a>
        </div>
        <hr>
        <!-- All Tasks -->
        <div class="task-container">
            <?php foreach($todo as $todo) : ?>
                <!-- Task -->
                <div class="task">
                    <a href="details.php?id=<?php echo $todo['id'] ?>">
                        <div class="task-info">
                            <h2><?php echo htmlspecialchars($todo['title']); ?></h2>
                            <p><?php echo htmlspecialchars($todo['description']); ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <!--  Footer -->
    <?php include('./templates/footer.php'); ?>

</html>