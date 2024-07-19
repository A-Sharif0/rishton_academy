<?php

require '../../config/connection.php';

$errorMsg = '';

if (isset($_POST['teacher']) && $_POST['teacher'] == 'store') {
    $Name = $_POST['Name'];
    $Address = $_POST['Address'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $AnnualSalary = $_POST['AnnualSalary'];
    $BackgroundCheck = $_POST['BackgroundCheck'];

    $query = "INSERT INTO teachers SET 
            Name = '$Name',
            Address = '$Address',
            PhoneNumber = '$PhoneNumber',
            AnnualSalary = '$AnnualSalary',
            BackgroundCheck = '$BackgroundCheck'
        ";
    $store = mysqli_query($connect, $query);
    if ($store) {
        header('location: ../../teacher_add?msg=success');
        exit;
    }
}
