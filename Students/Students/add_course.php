<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connect_db.php';
    $name = $_POST['coursename'];
    $instructor = $_POST['cinstructor'];
    $qry ="INSERT INTO `course` (`name`, `instructor`) VALUES ('$name',$instructor)";
    $insert = mysqli_query($con,$qry);
    if ($insert) {
        header("location: instructor.php?msg=added successfully!");
    }
    else{
        header("location: instructor.php?msg=Try again!");
    }
}
?>