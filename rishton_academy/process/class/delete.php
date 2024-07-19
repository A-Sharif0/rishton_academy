<?php

require '../../config/connection.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "DELETE FROM classes WHERE ClassID = $id";

    $store = mysqli_query($connect, $query);
    if ($store) {
        header('location:../../manage_classes?msg=delete');
        exit;
    }
}
