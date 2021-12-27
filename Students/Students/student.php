<?php
include 'connect_db.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "student") {
  $usid = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT - <?php echo $_SESSION['userName'] ?></title>
</head>
<body>
<center>
    <h1>Hello, <?php echo $_SESSION['userName'] ?></h1>
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>

    <h1>My Enrollments</h1>
<table style="width:1035px" border=1 >
  <tr>
    <th>ID</th>
    <th>Course</th>
    <th>Instructor</th>
    <th>Cancel</th>
  </tr>
  <?php
    $sql = "SELECT * FROM `enroll` WHERE student = $usid";
    $result = mysqli_query($con,$sql);
    while ($row = mysqli_fetch_assoc($result)) {
      
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
                <td>'.$crsname.'</td>
                <td>'.$instname.'</td>
                <td><form method="POST" action="delete.php"><input name="enid" value="'.$row['id'].'" hidden><button type="submit">Cancel</button></form></td>
            </tr>';
    }

  ?>
</table>
</center>
</body>
</html>
<?php
}
elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "instructor") {
    header("location: instructor.php");
}
else {
    header("location: login.php");
}
?>