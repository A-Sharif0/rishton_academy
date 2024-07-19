<?php
require '../../config/connection.php';

if (isset($_POST['dinnermoney']) && $_POST['dinnermoney'] == 'update') {
    $EditPupilID = $_POST['EditPupilID'];
    $PupilID = $_POST['PupilID'];
    $Amount = $_POST['Amount'];
    $Date = $_POST['Date'];

    $query = "UPDATE dinnermoney SET
        PupilID = '$PupilID',
        Amount = '$Amount',
        Date = '$Date'
        WHERE PupilID = '$EditPupilID'
    ";
    $store = mysqli_query($connect, $query);

    if ($store) {
        header('location: ../../manage_dinnermoney.php?msg=success');
        exit;
    } else {
        header('location: ../../dinnermoney_add.php?msg=error');
        exit;
    }
}
?>
