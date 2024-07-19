<?php
require '../../config/connection.php';

if (isset($_POST['dinnermoney']) && $_POST['dinnermoney'] == 'store') {
    $PupilID = $_POST['PupilID'];
    $Amount = $_POST['Amount'];
    $Date = $_POST['Date'];

    $check_query = "SELECT * FROM dinnermoney WHERE PupilID = '$PupilID' AND Date = '$Date'";
    $check_result = mysqli_query($connect, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        header('location: ../../dinnermoney_add.php?msg=duplicate');
        exit;
    }

    $query = "INSERT INTO dinnermoney SET
        PupilID = '$PupilID',
        Amount = '$Amount',
        Date = '$Date'
    ";
    $store = mysqli_query($connect, $query);

    if ($store) {
        header('location: ../../dinnermoney_add.php?msg=success');
        exit;
    } else {
        header('location: ../../dinnermoney_add.php?msg=error');
        exit;
    }
}
