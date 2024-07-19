<?php

require '../../config/connection.php';

$errorMsg = '';

if (isset($_POST['libbook']) && $_POST['libbook'] == 'store') {
    $Title = $_POST['Title'];
    $Author = $_POST['Author'];
    $CheckedOutTo = $_POST['CheckedOutTo'];

    $query = "INSERT INTO librarybooks SET 
            Title = '$Title',
            Author = '$Author',
            CheckedOutTo = '$CheckedOutTo'
        ";
    $store = mysqli_query($connect, $query);
    if ($store) {
        header('location: ../../libbook_add?msg=success');
        exit;
    }
}
