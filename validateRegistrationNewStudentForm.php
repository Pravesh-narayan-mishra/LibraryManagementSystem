<?php
 session_start();
 $name=$_POST['name'];
 $father=$_POST['fatherName'];
 $course=$_POST['course'];
 $year=$_POST['year'];
 $sem=$_POST['sem'];
 $email=$_POST['email'];
 $mobile=$_POST['mobile_no'];
 $address=$_POST['address'];
 $password=$_POST['password'];

 $con=mysqli_connect('localhost','root');
 mysqli_select_db($con,'librarymanagementsystem');
 $q="insert into studentRegistration(name,fatherName,course,year,sem,email,mobile,address,password)values('$name','$father','$course','$year','$sem','$email','$mobile','$address','$password')";
 $res=mysqli_query($con,$q);
 if($res==1)
 {
     $_SESSION['reg']=$name;
     header("location:http://localhost/gitHub/libraryManagementSystem/collegeLibrary.php");
 }
 mysqli_close($con);
?>