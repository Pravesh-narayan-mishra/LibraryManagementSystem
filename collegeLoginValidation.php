<?php
session_start();
$name=$_POST['name'];
$password=$_POST['password'];

$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'libraryManagementSystem');
$q="select *from collegeLogin where name='$name' && password='$password';";
$res=mysqli_query($con,$q);
$num=mysqli_num_rows($res);
if($num==1)
{
    $_SESSION['login']=$name;
    header("location:http://localhost/gitHub/libraryManagementSystem/collegeLibrary.php");
}
else
{
    header("location:http://localhost/gitHub/libraryManagementSystem/libraryManagementSystem.php");
}
mysqli_close($con);
?>