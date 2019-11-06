<?php
 session_start();
 $course=$_POST['course'];
 $b_name=$_POST['b_name'];
 $author=$_POST['author'];

 $con=mysqli_connect('localhost','root');
 mysqli_select_db($con,'librarymanagementsystem');
 $q="insert into books(course,book_name,author)values('$course','$b_name','$author')";
 $res=mysqli_query($con,$q);
 if(isset($res))
 {
     $_SESSION['saved']=$b_name;
     header("location:http://localhost/gitHub/libraryManagementSystem/collegeLibrary.php");
 }
 echo "insertion succesfull";
 mysqli_close($con);
?>