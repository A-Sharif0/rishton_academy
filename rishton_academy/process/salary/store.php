<?php
require '../../config/connection.php';

if (isset($_POST['salary']) && $_POST['salary'] == 'store') {
    $Amount = $_POST['Amount'];
    $Date = $_POST['Date'];


    $query = "INSERT INTO salaries SET
        Amount = '$Amount',
        Date = '$Date'
    ";
    $store = mysqli_query($connect, $query);

    if ($store) {
        header('location: ../../salary_add.php?msg=success');
        exit;
    } else {
        header('location: ../../salary_add.php?msg=error');
        exit;
    }
}
