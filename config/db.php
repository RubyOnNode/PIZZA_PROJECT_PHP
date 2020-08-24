<?php

//Connect to database
$conn = mysqli_connect('localhost', 'neem', 'neemnoob', 'neem_pizza');

//check connetion
if (!$conn) {
    echo 'database connection error ' . mysqli_connect_error();
}
