<?php

require '../../config/connection.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    
    $query = "DELETE FROM teachers WHERE TeacherID = $id";
    
    $store = mysqli_query($connect, $query);
    if ($store) {
        header('location:../../manage_teachers?msg=delete');
        exit;
    }
}
