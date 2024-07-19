<?php
require './config/connection.php';
require './config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['admin']) && $_POST['admin'] == 'login') {
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    $query = "SELECT * FROM admin WHERE (username='$username' OR email='$username')";
    $result = mysqli_query($connect, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);
        if (password_verify($password, $admin['password'])) {
            session_start();
            $_SESSION['ADMINNAME'] = $admin['username'];
            $_SESSION['ADMINID'] = $admin['id'];

            header('Location: ./home?success');
            exit();
        } else {
            header('Location: ./index?error=invalid_password');
            exit();
        }
    } else {
        header('Location: ./index?error=user_not_found');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/login.css">
  <title><?= $GLOBALS["name"]; ?> Login</title>
  <link rel="icon" type="image/x-icon" href="<?= $GLOBALS['logo']; ?>">

</head>

<body>
  <div class="container">
    <div class="logo">
      <img src="<?= $GLOBALS['logo']; ?>" alt="Rishton Academy Logo" class="logo-img" >
    </div>
    <br>
    <div class="login-container centered">
      <h2>Login</h2>
      <form action="./index" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
        <input type="hidden" name="admin" value="login">
      </form>
    </div>
  </div>
</body>

</html>