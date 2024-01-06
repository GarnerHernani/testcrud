<?php 

if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['Access'] == "administrator") {
    echo 'Welcome '.$_SESSION['UserLogin'];
} else {
    echo header('location: index.php');
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

    $id = $_GET['ID'];

    $sql = "SELECT * FROM `student_list` WHERE `id` = '$id'";

    $students = $con->query($sql) or die ($con->error);

    $row = $students->fetch_assoc();

?>

<div class="container">

    <form action="edit.php?ID=<?php echo $row['id']; ?>" method="post">
        <button class="float-start" type="submit" name="edit">Edit</button>
    </form>

    <form action="delete.php" method="post">
        <button class="float-end" type="submit" name="delete">Delete</button>
        <input class="float-end" type="hidden" name="ID" value="<?php echo $row['id']; ?>">
    </form>

    <br>
    <br>

    <h2><?php echo $row['first_name']; ?>  <?php echo $row['last_name']; ?></h2>
    <p>is a <?php echo $row['gender'];?></p>

</div>

<?php include 'scripts.php';?>
</body>
</html>
