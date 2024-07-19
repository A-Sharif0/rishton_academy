<?php

require '../../config/connection.php';

$errorMsg = '';

if (isset($_POST['teacherassistant']) && $_POST['teacherassistant'] == 'store') {
    $Name = $_POST['Name'];
    $Address = $_POST['Address'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $AnnualSalary = $_POST['AnnualSalary'];

    $query = "INSERT INTO teachingassistants SET 
            Name = '$Name',
            Address = '$Address',
            PhoneNumber = '$PhoneNumber',
            AnnualSalary = '$AnnualSalary'
        ";
    $store = mysqli_query($connect, $query);
    if ($store) {
        header('location: ../../teacherassistant_add?msg=success');
        exit;
    }
}
