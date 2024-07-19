<?php
require '../../config/connection.php';

if (isset($_POST['salary']) && $_POST['salary'] == 'update') {
    $Amount = $_POST['Amount'];
    $Date = $_POST['Date'];
    $SalaryID = $_POST['SalaryID'];

    $query = "UPDATE salaries SET
        Amount = '$Amount',
        Date = '$Date'
        WHERE SalaryID = '$SalaryID'
    ";
    $store = mysqli_query($connect, $query);

    if ($store) {
        header('location: ../../manage_salary.php?msg=success');
        exit;
    } else {
        header('location: ../../salary_add.php?msg=error');
        exit;
    }
}
?>
