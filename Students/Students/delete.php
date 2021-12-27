<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connect_db.php';
    $id = $_POST['enid'];    
    $qry ="DELETE FROM `enroll` WHERE id=$id";
    $delete = mysqli_query($con,$qry);
    if ($delete) {
        header("location: instructor.php?msg=deleted successfully!");
    }
    else{
        header("location: instructor.php?msg=Try again!");
    }
}
?>