<?php
// $temp=isset($_POST['submit1']);
// echo $temp;

    $conn=mysqli_connect('localhost','root','','serl') or die("Connection failed" .mysqli_connect_error());
    if(isset($_POST['ID'])&&isset($_POST['password'])){

        $ID=$_POST['ID'];
        $password=$_POST['password'];
    
        $sql="SELECT count(*) FROM admin WHERE adminID='$ID' AND password='$password'";
        $sql2="SELECT * FROM admin WHERE adminID='$ID' AND password='$password'";
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($query);
        $query2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_array($query2);
        // print_r($row);
        if($row[0]==1){
         
                echo 'Login successful!!';
                //header("Location: client_home.php?msg=" .$row2[0]);
                session_start();
                $_SESSION['uid']= $row2[0];
                header("Location: admin.php");    
                exit;
        }
        $sql="SELECT count(*) FROM faculty WHERE facultyID='$ID' AND password='$password'";
        $sql2="SELECT * FROM faculty WHERE facultyID='$ID' AND password='$password'";
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($query);
        $query2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_array($query2);
        // print_r($row);
        if($row[0]==1){
         
                echo 'Login successful!!';
                //header("Location: client_home.php?msg=" .$row2[0]);
                session_start();
                $_SESSION['uid']=$row2[0];
                header("Location: afterLogin.php?ID=$ID");
                exit;
        }
        $sql="SELECT count(*) FROM researcher WHERE researcherID='$ID' AND password='$password'";
        $sql2="SELECT * FROM researcher WHERE researcherID='$ID' AND password='$password'";
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($query);
        $query2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_array($query2);
        // print_r($row);
        if($row[0]==1){
         
                echo 'Login successful!!';
                //header("Location: client_home.php?msg=" .$row2[0]);
                session_start();
                $_SESSION['uid']= $row2[0];
                header("Location: afterLogin1.php?ID=$ID");
                exit;
        }
        else{
            echo 'Login unsuccesful !!';
            header("location: login.html");
        }
    }


?>