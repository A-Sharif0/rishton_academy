<?php

require '../../config/connection.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "DELETE FROM salaries WHERE SalaryID = $id";

    $store = mysqli_query($connect, $query);
    if ($store) {
        header('location:../../manage_salary?msg=delete');
        exit;
    }
}
