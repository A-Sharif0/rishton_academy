<?php
require './connection.php';

function seedData($conn) {
    $password = 'admin';
    $hashedPassword  = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO admin (username, email, password) VALUES 
            ('admin', 'admin@admin.com', '$hashedPassword')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Data seeded successfully.";
    } else {
        echo "Error seeding data: " . mysqli_error($conn);
    }
}


seedData($connect);
mysqli_close($connect);

?>