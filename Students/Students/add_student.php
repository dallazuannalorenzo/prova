<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connect_db.php';
    $student = $_POST['studentname'];
    $username = $_POST['studentusername'];
    $qry ="INSERT INTO `students` (`name`, `username`) VALUES ('$student', '$username')";
    $insert = mysqli_query($con,$qry);
    if ($insert) {
        header("location: instructor.php?msg=added successfully!");
    }
    else{
        header("location: instructor.php?msg=Try again!");
    }
}
?>