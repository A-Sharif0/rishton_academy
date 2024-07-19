<?php

require '../../config/connection.php';

if (isset($_POST['libbook']) && $_POST['libbook'] == 'update') {

    $Title = $_POST['Title'];
    $Author = $_POST['Author'];
    $CheckedOutTo = $_POST['CheckedOutTo'];
    $BookID = $_POST['BookID'];

    $query = "UPDATE librarybooks SET 
        Title = '$Title',
        Author = '$Author',
        CheckedOutTo = '$CheckedOutTo'
        WHERE BookID = $BookID
    ";

    $store = mysqli_query($connect, $query);
    if ($store) {
        header('location:../../manage_libbook?msg=success');
        exit;
    }
}
