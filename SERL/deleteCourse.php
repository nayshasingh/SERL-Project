<?php 
    session_start();
    if(!isset($_SESSION['uid']))
    {
        header("location: login.html");
    }
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['cid'])){
        $conn=mysqli_connect('localhost','root','','serl') or die("Connection failed" .mysqli_connect_error());
        $temp=$_POST['cid'];
        $query= "DELETE FROM courses WHERE CID='$temp'";
        $q1=mysqli_query($conn,$query);
        header("Location: admin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Faculty</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body style="background: rgb(207,231,247);
background: radial-gradient(circle, rgba(207,231,247,1) 0%, rgba(207,231,247,1) 100%); height:100vh;">
<form action="deleteCourse.php" method="POST" class="form">
        <h3>Delete Course</h3>
        <label for="cid">Enter CourseID:</label><br>
        <input type="text" name="cid" id="cid" required placeholder="ID"><br><br>
        <input type="submit" name="submit3" id="submit3"  class="btn">
    </form>
</body>
</html>