<?php

require '../../config/connection.php';

if (isset($_POST['teacher']) && $_POST['teacher'] == 'update') {

    $Name = $_POST['Name'];
    $Address = $_POST['Address'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $AnnualSalary = $_POST['AnnualSalary'];
    $BackgroundCheck = $_POST['BackgroundCheck'];
    $TeacherID = $_POST['TeacherID'];

    $query = "UPDATE teachers SET 
        Name = '$Name',
        Address = '$Address',
        PhoneNumber = '$PhoneNumber',
        AnnualSalary = '$AnnualSalary',
        BackgroundCheck = '$BackgroundCheck'
        WHERE TeacherID = $TeacherID
    ";

    $store = mysqli_query($connect, $query);
    if ($store) {
        header('location:../../manage_teachers?msg=success');
        exit;
    }
}
