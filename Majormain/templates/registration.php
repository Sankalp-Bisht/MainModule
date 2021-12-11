<?php

  session_start();
 
  //header('location:userregister.php');

  $con = mysqli_connect('localhost','root','','almamater');

 

  $name = $_POST['user'];
  $pass = $_POST['password'];
  $email = $_POST['email'];

  function alert_1($mes)
    {
      echo "<script>alert('$mes');</script>";
    }

  $s = "Select * from user where username = '$name' ";
  $result = mysqli_query($con,$s);
  $num=mysqli_num_rows($result);

  if($num == 1)
  {
     alert_1("username already exists!");
  }
  
  else
  {
  	$reg=" insert into user (username, email, password) values ('$name' , '$email' , '$pass')";
  	
  	mysqli_query($con , $reg);
  	alert_1("Registration successfull!!");
  }
?>