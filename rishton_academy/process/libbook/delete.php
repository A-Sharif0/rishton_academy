<?php

require '../../config/connection.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    
    $query = "DELETE FROM librarybooks WHERE BookID = $id";
    
    $store = mysqli_query($connect, $query);
    if ($store) {
        header('location:../../manage_libbook?msg=delete');
        exit;
    }
}
