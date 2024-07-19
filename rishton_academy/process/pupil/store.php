<?php

require '../../config/connection.php';

if (isset($_POST['pupil']) && $_POST['pupil'] == 'store') {

    $Name = $_POST['Name'];
    $Address = $_POST['Address'];
    $MedicalInformation = $_POST['MedicalInformation'];
    $ClassID = $_POST['ClassID'] ?: null;
    $ParentID = $_POST['ParentID'] ?: null;

    $query = "INSERT INTO pupils SET 
        Name = '$Name',
        Address = '$Address',
        MedicalInformation = '$MedicalInformation',
        ClassID = '$ClassID'
    ";
    $store = mysqli_query($connect, $query);
    if ($store) {
        $PupilID = mysqli_insert_id($connect);
        if ($ParentID !== 'NULL') {
            $query = "INSERT INTO pupilparent SET 
                PupilID = '$PupilID',
                ParentID = '$ParentID'
            ";
            $store = mysqli_query($connect, $query);
        }
        header('location:../../pupil_add?msg=success');
        exit;
    } else {
        header('Location: ../../pupil_add?msg=error');
        exit;
    }
}
