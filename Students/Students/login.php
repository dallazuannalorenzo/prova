<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LOGIN &mdash; ELIAS's WORLD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Student" />
    <meta name="keywords" content="" />
    <meta name="author" content="Savan" />

</head>

<body>

    <?php
    if (isset($_GET['login'])) {
      echo"<script>alert('".$_GET['msg']."');</script>";
    }
  ?>
    <center>
        <div>
            <div id="insl">
                <h2>INSTRUCTOR LOGIN</h2>
                <form method="POST" action="login_ins.php">
                    <input type="text" name="instuser" placeholder="Username"   >
                    <button type="submit" name="instlogin">Login</button>
                    <br>
                    <p style="font-weight: bold; cursor: pointer;" onclick="showStd()">STUDENT</p>
                </form>
            </div>
            <div id="stdl" style = "display:none;">
                <h2>STUDENT LOGIN</h2>
                <form method="POST" action="login_ins.php">
                    <input type="text" name="stduser" placeholder="Username" />
                    <button type="submit" name="stdlogin">Login</button>
                    <br>
                    <p style="font-weight: bold; cursor: pointer;" onclick="showIns()">INSTRUCTOR</p>
                </form>
            </div>
        </div>
    </center>

    <br>
    <?php 
      if(isset($_GET['signup'])){
        echo"<script>alert('".$_GET['message']."');</script>";
      }
      ?>
</body>
<script>
    function showStd(){
        document.getElementById("stdl").style.display = "block";
        document.getElementById("insl").style.display = "none";
    }
    function showIns(){
        document.getElementById("stdl").style.display = "none";
        document.getElementById("insl").style.display = "block";
    }
</script>

</html>