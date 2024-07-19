<?php

require '../../config/connection.php';

if (isset($_POST['parent']) && $_POST['parent'] == 'store') {

    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Telephone = $_POST['Telephone'];
    $Address = $_POST['Address'];

    $query = "INSERT INTO parentsguardians SET 
        Name = '$Name',
        Email = '$Email',
        Telephone = '$Telephone',
        Address = '$Address'
    ";
    $store = mysqli_query($connect, $query);
    if ($store) {
        header('location:../../parent_add?msg=success');
        exit;
    }
}
