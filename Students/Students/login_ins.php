<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect_db.php';
    if(isset($_POST['instlogin'])){
        $instuser = $_POST['instuser'];
        $sql = "SELECT * FROM `instructors` WHERE username='$instuser'";
        $result = mysqli_query($con,$sql);
        $numRows = mysqli_num_rows($result);
        if ($numRows < 1) {
            $msg = "No account found!";
        }
        elseif ($numRows == 1) {
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['loggedin'] = "instructor";
            $_SESSION['userName'] = $row['name'];
            $_SESSION['user_id'] = $row['id'];
            $un = $_SESSION['userName'];
            header("Location: instructor.php");
            exit();
        }
    }
    elseif(isset($_POST['stdlogin'])){
        $stduser = $_POST['stduser'];
        $sql = "SELECT * FROM `students` WHERE username='$stduser'";
        $result = mysqli_query($con,$sql);
        $numRows = mysqli_num_rows($result);
        if ($numRows < 1) {
            $msg = "No account found!";
        }
        elseif ($numRows == 1) {
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['loggedin'] = "student";
            $_SESSION['userName'] = $row['name'];
            $_SESSION['user_id'] = $row['id'];
            $un = $_SESSION['userName'];
           
        }
        header("Location: student.php?msg=$msg");
        exit();
    }

//     $email = $_POST['loginEmail'];
//     $sql = "SELECT * FROM `users` WHERE email='$email'";
//     $result = mysqli_query($conn,$sql);
//     $numRows = mysqli_num_rows($result);
//     if ($numRows < 1) {
//         $msg = "No account found!";
//     }
//     elseif ($numRows == 1) {
//         $row = mysqli_fetch_assoc($result);
//         if(password_verify($pass, $row['password'])){
//             session_start();
//             $_SESSION['loggedin'] = "student";
//             $_SESSION['userName'] = $row['name'];
//             $_SESSION['user_id'] = $row['sr_no'];
//             $un = $_SESSION['userName'];
//             header("Location: ../Yug%20Movies/?login=0&user=$un");
//             exit();
//             }
//         else{
//         $msg = "Wrong Password";
//         }
//     }
//     // it will redirect to home page and pass the message
//     header("Location:login.php?login=0&msg=$msg");
//     exit();

 }
// // If someone tries to type url of this page directly
// header("Location: /work/Yug%20Movies/");
?>