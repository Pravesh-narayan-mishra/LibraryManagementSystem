<?php
session_start();
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
$q="delete from books where b_id=$b_id[$i]";
$res=mysqli_query($con,$q);
}
if($res==1)
{
    $_SESSION['del']="deletion successfull";
    header("location:http://localhost/gitHub/librarymanagementsystem/bookDeleteForm.php");
}
mysqli_close($con);
?>