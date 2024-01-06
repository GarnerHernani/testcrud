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

    if (isset($_POST['submit'])) {

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];
        
        $sql = "INSERT INTO `student_list`(`first_name`, `last_name`, `gender`) VALUES ('$fname', '$lname', '$gender')";

        $con->query($sql) or die ($con->error);

        echo header('location: index.php');

    }

?>


<div class="container">

    <form action="" method="post">

    <label>First Name</label>
    <input type="text" name="firstname" id="firstname">

    <label>Last Name</label>
    <input type="text" name="lastname" id="lastname">

    <label>Gender</label>
    <select name="gender" id="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>

    <input type="submit" name="submit" value="Submit">

    </form>

</div>


<?php include 'scripts.php';?>

</body>
</html>