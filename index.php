<?php

include './config/db.php';

//write query to get pizzas from
$sql = 'SELECT title , ingredients , id FROM pizzas ORDER BY created_at';

//make query to get the result
$result = mysqli_query($conn, $sql);

$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

//close connetion
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'templates/header.php'; ?>

    <h4 class="center grey-text">Pizzas!</h4>

    <div class="container">
        <div class="row">
            <?php foreach ($pizzas as $pizza): ?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <img src="img/pizza.png" alt="img" class="pizza">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                            <div>
                                <ul>
                                    <?php foreach (explode(',', $pizza['ingredients']) as $ing): ?>
                                        <li><?php echo htmlspecialchars($ing) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="card-action center">
                            <a href="details.php?id=<?php echo $pizza['id'] ?>" class="brand-text" style="margin: 0px;">More Info</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include 'templates/footer.php'; ?>

</html>
