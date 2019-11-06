<?php
  $y=$_GET['v'];
  $con=mysqli_connect('localhost','root');
  mysqli_select_db($con,'librarymanagementsystem');
  $q="select*from studentregistration where id=$y";
  $res=mysqli_query($con,$q);
  $num=mysqli_num_rows($res);
  if($num>0)
  { 
    echo "true";
  }
  else
    echo "false";
  
?>