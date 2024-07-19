<?php

require '../../config/connection.php';

if (isset($_POST['pupil']) && $_POST['pupil'] == 'update') {

    $Name = $_POST['Name'];
    $Address = $_POST['Address'];
    $MedicalInformation = $_POST['MedicalInformation'];
    $ClassID = $_POST['ClassID'] ?: null;
    $PupilID = $_POST['PupilID'];
    $ParentID = $_POST['ParentID'];

    $query = "UPDATE pupils SET 
        Name = '$Name',
        Address = '$Address',
        MedicalInformation = '$MedicalInformation',
        ClassID = '$ClassID'
        WHERE PupilID = $PupilID
    ";

    $store = mysqli_query($connect, $query);
    if ($store) {
        $query = "DELETE FROM pupilparent WHERE PupilID = $PupilID";
        $delete = mysqli_query($connect, $query);
        if ($delete) {
            $query = "INSERT INTO pupilparent SET 
            PupilID = '$PupilID',
            ParentID = '$ParentID'
        ";
        $store = mysqli_query($connect, $query);
        }
        header('location:../../manage_pupils?msg=success');
        exit;
    }
}
