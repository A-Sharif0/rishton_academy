<?php

require '../../config/connection.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    
    $query = "DELETE FROM teachingassistants WHERE AssistantID = $id";
    
    $store = mysqli_query($connect, $query);
    if ($store) {
        header('location:../../manage_teacherassistant?msg=delete');
        exit;
    }
}
