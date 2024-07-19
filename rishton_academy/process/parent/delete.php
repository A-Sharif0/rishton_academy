<?php

require '../../config/connection.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "DELETE FROM parentsguardians WHERE ParentID = $id";

    $store = mysqli_query($connect, $query);
    if ($store) {
        header('location:../../manage_parents?msg=delete');
        exit;
    }
}
