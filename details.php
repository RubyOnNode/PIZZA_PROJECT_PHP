<?php
include 'config/db.php';
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    //make sql connection
    $sql = "SELECT * FROM pizzas WHERE ID = $id";

    //GET QUERY RESULT
    $result = mysqli_query($conn, $sql);

    //fetch result into array
    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
}
if (isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";
    if (mysqli_query($conn, $sql)) {
        //success
        header('Location: index.php');
    } else {
        //failure
        echo 'Query Error' . mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <?php include 'templates/header.php' ?>

    <div class="container center grey-text">
        <?php if ($pizza): ?>
            <h4><?php echo htmlspecialchars($pizza['title']) ?></h4>
            <p>Created By: <?php echo htmlspecialchars($pizza['email']) ?></p>
            <p>Created At: <?php echo date($pizza['created_at']) ?></p>
            <h5>Ingredients:</h5>
            <p><?php echo htmlspecialchars($pizza['ingredients']) ?></p>

            <form action="details.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
                <input type="submit" name="delete" , value="Delete" class="btn brand z-depth-0">
            </form>

        <?php else: ?>
            <h3><?php echo 'No Such Pizza Exist' ?></h3>
        <?php endif; ?>
    </div>

    <?php include 'templates/footer.php' ?>
</html>