<?php 
include 'connect_db.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "instructor") {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSTRUCTOR - ELIAS's WORLD</title>
</head>
<body>
<center>
<h1>Hello, <?php echo $_SESSION['userName'] ?></h1>
<form action="logout.php" method="post">
<button type="submit">Logout</button>
</form>
<h3>Enroll</h3>
<form method="POST" action="new_enroll.php">
<label for="student">Student</label>
<select name="student" id="student">
    <?php
        $sql5 = "SELECT * FROM `students`";
        $result5 = mysqli_query($con,$sql5);
        while($row5 = mysqli_fetch_assoc($result5)){
            echo '<option value="'.$row5['id'].'">'.$row5['id'].'.'. $row5['name'].'</option>';
            
        }
    ?>
</select>
<label for="course">Course</label>
<select name="course" id="course">
    <?php
        $sql6 = "SELECT * FROM `course`";
        $result6 = mysqli_query($con,$sql6);
        while($row6 = mysqli_fetch_assoc($result6)){
        echo '<option value="'.$row6['id'].'">'.$row6['id'].'.'. $row6['name'].'</option>';
            
        }
    ?>
</select>
<button type="submit">Enroll</button>
</form>
<h3>Add Student</h3>
<form action="add_student.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="studentname" id="name">
        <label for="username">Username</label>
        <input type="text" name="studentusername"id="username">
        <button type="submit">Add</button>
</form>
<br>
<h3>Add Course </h3>
<form action="add_course.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="coursename" id="name">
        <input type="hidden" name="cinstructor" value="<?php echo $_SESSION['user_id'] ?>">
        <button type="submit">Add</button>
</form>
<br><br><br>
<h1>Enrollments</h1>
<table style="width:1035px" border=1 >
  <tr>
    <th>ID</th>
    <th>Student</th>
    <th>Course</th>
    <th>Instructor</th>
    <th>Delete</th>
  </tr>
  <?php
    $sql = "SELECT * FROM `enroll`";
    $result = mysqli_query($con,$sql);
    while ($row = mysqli_fetch_assoc($result)) {
        //Get the the of student
        $stdid = $row['student'];
        $sqlstd = "SELECT * FROM `students` WHERE id = $stdid";
        $result2 = mysqli_query($con,$sqlstd);
        $rowstd = mysqli_fetch_assoc($result2);
        $stdname = $rowstd['name'];

        //Get the name of course and id of instructor
        $crsid = $row['course'];
        $sqlcrs = "SELECT * FROM `course` WHERE id = $crsid";
        $result3 = mysqli_query($con,$sqlcrs);
        $rowcrs = mysqli_fetch_assoc($result3);
        $crsname = $rowcrs['name'];
        $instid = $rowcrs['instructor'];
        
        //Get name of instructor
        $sqlinst = "SELECT * FROM `instructors` WHERE id = $instid";
        $result4 = mysqli_query($con,$sqlinst);
        $rowinst = mysqli_fetch_assoc($result4);
        $instname = $rowinst['name'];

        echo '<tr>
                <td>'.$row['id'].'</td>
                <td>'.$stdname.'</td>
                <td>'.$crsname.'</td>
                <td>'.$instname.'</td>
                <td><form method="POST" action="delete.php"><input name="enid" value="'.$row['id'].'" hidden><button type="submit">Delete</button></form></td>
            </tr>';
    }

  ?>
</table>
</center>
</body>
<?php
    if (isset($_GET['msg'])) {
        echo'<script>alert("'.$_GET['msg'].'")</script>';
    }
?>
</html>
<?php
}
elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "student") {
    header("location: student.php");
}
else {
    header("location: login.php");
}
?>