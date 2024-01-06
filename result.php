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
    
    <?php include 'style.php'; include 'connection.php'; ?>

</head>
<body>

<?php
    $con = connection();

    $search = $_GET['search'];

    $sql = "SELECT * FROM `student_list` WHERE `first_name` LIKE '%$search%' || `last_name` LIKE '%$search%'";
    $students = $con->query($sql) or die ($con->error);
    $row = $students->fetch_assoc();
?>



<div class="container">

    <h1 class="text-center">Student Mangement System</h1>
    <br>
    <br>

    <form action="result.php" method="get">
        <input type="text" name="search" id="search">
        <button type="submit">search</button>
    </form>

    <?php if (isset($_SESSION['UserLogin'])) {?>
        <a class="float-end" href="add.php">Add New</a>
        <a class="float-end" href="logout.php">Logout</a>
    <?php } else { ?>
        <a class="float-end" href="login.php">Login</a>
    <?php } ?>

    <?php if($row > 0) { ?>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Added at</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

            <?php 
            do { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['birth_day']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['added_at']; ?></td>
                    <td><a href="details.php?ID=<?php echo $row['id']; ?>">View Details</a></td>
                </tr>
            <?php } while ($row = $students->fetch_assoc()); ?>

        </tbody>
    </table>

    <?php }else{ ?>
        <h1>No result</h1>
    <?php } ?>

</div>



<?php include 'scripts.php';?>
</body>
</html>