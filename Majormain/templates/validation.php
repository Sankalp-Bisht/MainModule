<?php

  session_start();
 
  $con = mysqli_connect('localhost','root','','Major');

 

  $name = $_POST['user'];
  $pass = $_POST['password'];

 function alert_1($mes)
    {
      echo "<script>alert('$mes');</script>";
    }
  $s = "Select * from user where username = '$name' && password = '$pass' ";
  $result = mysqli_query($con,$s);
  $num=mysqli_num_rows($result);

  if($num == 1)
  {
     $_SESSION['username'] = $name;
     header('location:home.html');
  }
  
  else
  {
      
      alert_1("username or password entered is incorrect");
      header('location:userregister.php');
      
  }
?>