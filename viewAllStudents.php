<?php
 session_start();
 if(!isset($_SESSION['login']))
 {
     header("location:http://localhost/gitHub/libraryManagementSystem/libraryManagementSystem.php");
 }

    $con=mysqli_connect('localhost','root');
    mysqli_select_db($con,'librarymanagementsystem');
    $q="select*from studentRegistration";
    $res=mysqli_query($con,$q);
    $num=mysqli_num_rows($res);
    ?>
<html>
    <head>
        <style>
            .
            {
                padding :0px;
                margin :0px;
            }
            .menu
            {
                position :fixed;
                top :0px;
                width :100%;
                height :100px;
                background-color :rgba(0,0.5,2,0.7);
            }
            .menu h2
            {
                padding-top :5px;
                padding-left :40px;
                color :white;
                font :italic bold 40px georgia;
                text-shadow :2px 2px pink;
            }
             #tb1
             {
                 font-family :"Trebuchet MS",Arial,Helvetica,Sans-Serif;
                 border-collapse :collapse;
                 width :100%;
                 margin-top :120px;
             }
             #tb1 td,#tb1 th
             {
                 border :1px solid #addd;
                 padding :8px;
             }
             #tb1 tr:nth-child(even)
             {
                 background-color :#f2f2dd;
             }
             #tb1 tr:hover
             {
                 background-color :#ddf2f2;
                 cursor :pointer;
             }
             #tb1 th
             {
                 padding-top :20px;
                 padding-bottom :20px;
                 text-align :left;
                 color :white;
                 background-color :gray;
             }
             #logout
           {
               position :absolute;
               top :400px;
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
    </body>
        <div class="menu">
           <h2>All Student Data</h2>
        </div>
        <table id="tb1">
            <tr>
                <th>Student Id</th>
                <th>Name</th>
                <th>Father name</th>
                <th>Course</th>
                <th>Year</th>
                <th>Semester</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Password</th>
            </tr>
        <?php
        for($i=1;$i<=$num;$i++)
        {
           $row=mysqli_fetch_array($res);
        ?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['fatherName'];?></td>
                <td><?php echo $row['course'];?></td>
                <td><?php echo $row['year'];?></td>
                <td><?php echo $row['sem'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['mobile'];?></td>
                <td><?php echo $row['address'];?></td>
                <td><?php echo $row['password'];?></td>
            </tr>
        <?php
        }
        ?>
        </table>

        <div id="logout">
            <a href="http://localhost/gitHub/libraryManagementSystem/collegeLogout.php">Logout</a>
        </div>
    </body>
</html>
   