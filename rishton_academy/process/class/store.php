<?php

require '../../config/connection.php';

if (isset($_POST['class']) && $_POST['class'] == 'store') {

    $ClassName = $_POST['ClassName'];
    $Capacity = $_POST['Capacity'];
    $TeacherID = $_POST['TeacherID'] ?: null;

    $checkQuery = "SELECT COUNT(*) as count FROM classes WHERE TeacherID = '$TeacherID'";
    $checkResult = mysqli_query($connect, $checkQuery);
    $row = mysqli_fetch_assoc($checkResult);
    $count = $row['count'];

    if ($count > 0) {
        header('location: ../../class_add?msg=error');
    } else {

        $query = "INSERT INTO classes SET 
        ClassName = '$ClassName',
        Capacity = '$Capacity',
        TeacherID = '$TeacherID'
    ";
        $store = mysqli_query($connect, $query);
        if ($store) {
            header('location:../../class_add?msg=success');
            exit;
        }
    }
}
