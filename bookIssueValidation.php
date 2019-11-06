<?php
$size=sizeOf($_POST);
$j=1;
for($i=1;$i<=$size-1;$i++,$j++)
{
   $index="b".$j;
   if(isset($_POST[$index]))
   {
       $b_id[$i]=$_POST[$index];
   }
   else
   $i--;
}

$s_id=$_POST['sId'];
$date=date("y/m/d");
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'librarymanagementsystem');

for($i=1;$i<=$size-1;$i++)
{
$rq[$i]="select s_id from books where b_id=$b_id[$i]";
$res[$i]=mysqli_query($con,$rq[$i]);
$row[$i]=mysqli_fetch_array($res[$i]);
}
    for($i=1;$i<=$size-1;$i++)
    {
       if($row[$i]['s_id']==null)
        {
            $q="update books set status='Book issue',s_id=$s_id,date='$date' where b_id=$b_id[$i]";
            mysqli_query($con,$q);
        }
    } 
mysqli_close($con);
?>