<?php

require '../../config/connection.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "DELETE FROM dinnermoney WHERE PupilID = $id";

    $store = mysqli_query($connect, $query);
    if ($store) {
        header('location:../../manage_dinnermoney?msg=delete');
        exit;
    }
}
