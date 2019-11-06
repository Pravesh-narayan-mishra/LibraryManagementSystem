<?php
  $size=sizeof($_POST);
  $j=1;
  for($i=1;$i<=$size;$i++,$j++)
  { 
     $index="b".$j;
     if(isset($_POST[$index]))
     {
     $b_id[$i]=$_POST[$index];
     }
     else
     $i--;
  }
   $con=mysqli_connect('localhost','root');
   mysqli_select_db($con,'librarymanagementsystem');
   for($i=1;$i<=$size;$i++)
   {
   $q="update books set status=null,s_id=null where b_id=$b_id[$i]";
   $res=mysqli_query($con,$q);
   }
   if($res==1)
   {
      echo "book submit";
   }
   ?>
   <br/><a href="http://localhost/gitHub/libraryManagementSystem/collegeLibrary.php">Click To Return Home Page</a>
   <?php
   mysqli_close($con);
   ?>