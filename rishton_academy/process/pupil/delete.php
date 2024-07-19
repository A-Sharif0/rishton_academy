<?php

require '../../config/connection.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "DELETE FROM pupils WHERE PupilID = $id";

    $store = mysqli_query($connect, $query);
    if ($store) {
        header('location:../../manage_pupils?msg=delete');
        exit;
    }
}
