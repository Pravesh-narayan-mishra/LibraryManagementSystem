<?php
 session_start();
 $size=sizeof($_POST);
 $row=$size/4;
 
 for($i=1;$i<=$row;$i++)
 {
 $index1="b_id".$i;
 $b_id[$i]=$_POST[$index1];
 $index2="course".$i;
 $course[$i]=$_POST[$index2];
 $index3="b_name".$i;
 $b_name[$i]=$_POST[$index3];
 $index4="author".$i;
 $author[$i]=$_POST[$index4];
 } 
 $con=mysqli_connect('localhost','root');
 mysqli_select_db($con,'libraryManagementSystem');
 for($i=1;$i<=$row;$i++)
 {
 $q="update books set course='$course[$i]',book_name='$b_name[$i]',author='$author[$i]'where b_id=$b_id[$i]";
 $res=mysqli_query($con,$q);
 };
 if($res==1)
 {
  $_SESSION['up']="Updation Successfull";
  header("location:http://localhost/gitHub/libraryManagementSystem/bookUpdateForm.php");
 }
 mysqli_close($con);
?>
