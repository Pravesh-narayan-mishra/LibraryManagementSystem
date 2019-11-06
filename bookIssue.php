<?php
 session_start();
 if(!isset($_SESSION['login']))
 {
     header("location:http://localhost/gitHub/libraryManagementSystem/libraryManagementSystem.php");
 }
 ?>
<html>
    <head>
        <title>student information</title>
        <style type="text/css">
            #pageHeading
            {
                padding-left :500px;
                color :red;
                font-size :40px;
                text-decoration :underline;
            }
            #viewAllBooks
            {
                position :absolute;
                background-color :#ffaa;
                left :30px;
                top :37px;
            }
            
            #issueBook
            {
                position :absolute;
                background-color :#ffaa;
                left :800px;
                top :70px;
                
            }
            input
            {
                display :inline;
                width :83px;
                height :30px;      
            }
            #logout
           {
               position :absolute;
               top :800px;
               bottom :40px;
               left :10px;
               margin :20px;
           }
           #logout a
           {
               color :red;
               text-decoration :none;
               font-size :20px;
               font :italic bold 16px/20px georgia;
           }
           #logout a:hover
           {
               color :orange;
           }
        </style>
    </head>
    <body>
       <?php
  
          $s_id=$_POST['s_id'];
          $con=mysqli_connect('localhost','root');
          mysqli_select_db($con,'librarymanagementsystem');
          $q="select*from studentRegistration where id=$s_id";
          $res=mysqli_query($con,$q);
          $num=mysqli_num_rows($res);
          $row=mysqli_fetch_array($res);
        ?>
          <!-- that use to check valid student id -->

        <div id="pageHeading">
            <?php
            if($num>0)
                {
                    echo $row['name']." "."library information";
                ?>
        
         <!-- view all books -->
        
        <div id="viewAllBooks">
            <?php
            $con=mysqli_connect('localhost','root');
            mysqli_select_db($con,'librarymanagementsystem');
            $q="select*from books";
            $b_res=mysqli_query($con,$q);
            $b_num=mysqli_num_rows($b_res);
            ?>
            <form action="http://localhost/gitHub/libraryManagementSystem/bookIssueValidation.php"method="post">
            <table border="2px"cellspacing="0px"cellpadding="10px"id="viewAllbooks">
                <tr>
                    <th colspan="6"style="color :orange;font-size :25px;text-decoration :underline">All books</th>
                </tr>
                <tr>
                   <th>Id</th>
                   <th>Course</th>
                   <th>Book Name</th>
                   <th>Author</th>
                   <th>Status</th>
                   <th>Issue</th>
                </tr>
                <?php
                for($i=1;$i<=$b_num;$i++)
                {
                    $b_row=mysqli_fetch_array($b_res);
                    ?>
                    <tr>
                        <td><?php echo $b_row['b_id'];?></td>
                        <td><?php echo $b_row['course'];?></td>
                        <td><?php echo $b_row['book_name'];?></td>
                        <td><?php echo $b_row['author'];?></td>
                        <td><?php echo $b_row['status'];?></td>
                        <td><input type="checkbox"name="b<?php echo $i?>"value="<?php echo $b_row['b_id'];?>"/></td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                   <td><input type="hidden"name="sId"value="<?php echo $s_id?>"/></td>
                   <td colspan="6"align="center"><input type="submit"value="Book Issue"/></td>
                </tr>
            </table>
            </form>
        </div>
        
        <!-- view issued books & submit -->

        <div>
            <form action="http://localhost/gitHub/libraryManagementsystem/bookSubmit.php"method="POST">
            <table border="2px"cellspacing="0px"cellpadding="5px"id="issueBook">
              <tr>
                <th colspan="6"style="color :orange;font-size :25px;text-decoration :underline">View issued books & Submit</th>
              </tr>
              <tr> 
                <th>Book Id</th>
                <th>Course</th>
                <th>Book Name</th>
                <th>Author</th>
                <th>Issue Date</th>
                <th>Submit book</th>
              </tr>
             <?php    
               $iq="select*from books where s_id=$s_id";       
               $i_res=mysqli_query($con,$iq);
               $i_num=mysqli_num_rows($i_res);
               for($i=1;$i<=$i_num;$i++)
               {
                   $i_row=mysqli_fetch_array($i_res);
                   ?>                  
                    <tr>
                        <td><?php echo $i_row['b_id'];?></td>
                        <td><?php echo $i_row['course'];?></td>
                        <td><?php echo $i_row['book_name'];?></td>
                        <td><?php echo $i_row['author'];?></td>
                        <td><?php echo $i_row['date'];?></td>
                        <td><input type="checkbox"name="b<?php echo $i?>"value="<?php echo $i_row['b_id'];?>"/></td>
                    </tr>
                <?php
                }
                ?>
                    <tr>
                        <td colspan="6"align="center"><input type="submit"value="Book submit"/></td>
                    </tr>
            </table>
            </form>
        </div>

           <!-- full of check valid student id -->
            <?php
              }    
                else
                echo "student id not found.... </br> Plese enter a valid student id..";
            ?>
        </div>

        <div id="logout">
            <a href="http://localhost/gitHub/libraryManagementSystem/collegeLogout.php">Logout</a>
        </div>
    </body>
</html>