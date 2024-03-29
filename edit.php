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

    if (isset($_POST['submit'])) {

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];
        
        $sql = "UPDATE `student_list` SET `first_name` = '$fname', `last_name` = '$lname', `gender` = '$gender' WHERE id = '$id'";

        $con->query($sql) or die ($con->error);

        echo header('location: details.php?ID='.$id);

    }

?>


<div class="container">

    <form action="" method="post">

    <label>First Name</label>
    <input type="text" name="firstname" id="firstname" value="<?php echo $row['first_name']; ?>">

    <label>Last Name</label>
    <input type="text" name="lastname" id="lastname" value="<?php echo $row['last_name']; ?>">

    <label>Gender</label>
    <select name="gender" id="gender">
        <option value="Male" <?php echo ($row['gender'] == "Male")? 'selected' : ''; ?>>Male</option>
        <option value="Female" <?php echo ($row['gender'] == "Female")? 'selected' : ''; ?>>Female</option>
    </select>

    <input type="submit" name="submit" value="Update">

    </form>

</div>


<?php include 'scripts.php';?>

</body>
</html>