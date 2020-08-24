<?php
session_start();
if ($_SERVER['QUERY_STRING'] == 'noname') {
    unset($_SESSION['name']);
}
$name = $_SESSION['name'] ?? 'Guest';

$gender = $_COOKIE['gender'] ?? 'Unknown';

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="./index.php" class="brand-logo brand-text">nEEm Pizza</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class="grey-text">Welcome: <?php echo htmlspecialchars($name); ?></li>
                <li class="grey-text">(<?php echo htmlspecialchars($gender); ?>)</li>
                <li><a href="./addPizza.php" class="btn brand z-depth-0">Add a piZZa</a></li>
            </ul>
        </div>
    </nav>
