<!-- PHP -->
<?php 
	include('config/db_connect.php');

	if (isset($_POST['Delete'])) {
		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
		$sql = "DELETE FROM `todo` WHERE id = '$id_to_delete'";
		if (mysqli_query($conn , $sql)) {
			header('Location: index.php');
		} else {
			echo 'Query Error: ' . mysqli_error($conn);
		}
	}

	if (isset($_GET['id'])) {
		$id = mysqli_real_escape_string($conn, $_GET['id']);
		$sql = "SELECT * FROM `todo` WHERE `id` = '$id'";
		$result = mysqli_query($conn, $sql);
		$todo = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		mysqli_close($conn);
	}
?>

<!-- HTML -->
<!DOCTYPE html>
<html>

<!-- Header and CSS -->
<link rel="stylesheet" href="styles\style.css">
<?php include('./templates/header.php'); ?>

    <!-- Main -->
    <main>
        <div class="details">
            <?php if($todo): ?>
                <h2><?php echo $todo['title']; ?></h2>
                <p><?php echo $todo['description']; ?></p>
                <p>Created at: <?php echo date($todo['created_at']); ?></p>

                <!-- Delete --->
			    <form action="details.php" method="POST">
			        <input type="hidden" name="id_to_delete" value="<?php echo $todo['id']; ?>">
			        <input type="submit" name="Delete" value="Delete">
			    </form>
            <?php else: ?>
			    <h1>No such note exists!</h1>
		    <?php endif ?>
        </div>
    </main>

    <!--  Footer -->
    <?php include('./templates/footer.php'); ?>

</html>