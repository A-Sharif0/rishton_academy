<?php

require '../../config/connection.php';

if (isset($_POST['teacherassistant']) && $_POST['teacherassistant'] == 'update') {

    $Name = $_POST['Name'];
    $Address = $_POST['Address'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $AnnualSalary = $_POST['AnnualSalary'];
    $AssistantID = $_POST['AssistantID'];

    $query = "UPDATE teachingassistants SET 
        Name = '$Name',
        Address = '$Address',
        PhoneNumber = '$PhoneNumber',
        AnnualSalary = '$AnnualSalary'
        WHERE AssistantID = $AssistantID
    ";

    $store = mysqli_query($connect, $query);
    if ($store) {
        header('location:../../manage_teacherassistant?msg=success');
        exit;
    }
}
