<?php

require '../../config/connection.php';

if (isset($_POST['class']) && $_POST['class'] == 'update') {

    $ClassName = $_POST['ClassName'];
    $Capacity = $_POST['Capacity'];
    $TeacherID = $_POST['TeacherID'];
    $ClassID = $_POST['ClassID'];

    $query = "UPDATE classes SET 
        ClassName = '$ClassName',
        Capacity = '$Capacity',
        TeacherID = '$TeacherID'
        WHERE ClassID = $ClassID
    ";

    $store = mysqli_query($connect, $query);
    if ($store) {
        header('location:../../manage_classes?msg=success');
        exit;
    }
}
