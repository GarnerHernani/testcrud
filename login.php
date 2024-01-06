<?php 

    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['UserLogin'])) {
        echo 'Welcome '.$_SESSION['UserLogin'];
    } else {
        echo 'Welcome Guest';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    
    <?php include 'style.php'; include 'connection.php'; $con = connection(); ?>

</head>
<body>

<?php

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `student_users` WHERE `username` = '$username' AND `password` = '$password'";

        $user = $con->query($sql) or die ($con->error);

        $row = $user->fetch_assoc();

        $total = $user->num_rows;

        if ($total > 0) {
            $_SESSION['UserLogin'] = $row['username'];
            $_SESSION['Access'] = $row['access'];

            echo header('location: index.php');
        } else {
            echo 'No user found.';
        }
    }

?>



<div class="container">

    <h1 class="text-center">Login Page</h1>
    <br>
    <br>

    <form action="" method="post">
        <label>Username</label>
        <input type="text" name="username" id="username">

        <label>Password</label>
        <input type="password" name="password" id="password">

        <button type="submit" name="login">Login</button>
    </form>

</div>



<?php include 'scripts.php';?>
</body>
</html>