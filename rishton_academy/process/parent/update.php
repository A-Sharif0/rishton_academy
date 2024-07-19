<?php

require '../../config/connection.php';

if (isset($_POST['parent']) && $_POST['parent'] == 'update') {

    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Telephone = $_POST['Telephone'];
    $Address = $_POST['Address'];
    $ParentID = $_POST['ParentID'];

    $query = "UPDATE parentsguardians 
        SET Name = '$Name', 
        Email = '$Email', 
        Telephone = '$Telephone', 
        Address = '$Address' 
        WHERE ParentID = $ParentID
    ";

    $store = mysqli_query($connect, $query);
    if ($store) {
        header('location:../../manage_parents?msg=success');
        exit;
    }
}
