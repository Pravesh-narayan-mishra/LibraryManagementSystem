<?php
 session_start();
 if(!isset($_SESSION['login']))
 {
     header("location:http://localhost/gitHub/libraryManagementSystem/libraryManagementSystem.php");
 }
 ?>
<!doctype html>
<html>
    <head>
         <title>View All Books</title>
         <style type="text/css">
          .
          {
              padding :0px;
              margin :0px;
          }
          .menu
          {
              position :absolute;
              top :0px;;
              width :100%;
              height :100px;
              background-color :rgba(0,0.5,2,0.7);
              z-index :1;
          }
          .menu h2
          {
              text-align :center;
              top :40px;
              font :italic bold 40px georgia;
              color :white;
              text-shadow :3px 3px 3px pink;
          }
          #tb1
          {
              position :absolute;
              top :150px;
              width :80%;
              border-collapse :collapse;
          }
          #tb1 th,td
          {
              border :2px solid #aaad;
              padding :8px;
          }
          #tb1 tr:nth-child(even)
          {
              background-color :#f2f2dd;

          }
          #tb1 tr:hover
          {
              background-color :#ddf2f2;
          }
          #tb1 th
          {
              background-color :gray;
          }
          #searchBar
          {
              position: absolute;
              top :120px;
          }
          #logout
           {
               position :absolute;
               top :570px;
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
        <div class="menu">
        <h2>Your All Books</h2>
        </div>

        <div id="viewAllBooks">
            <table id="tb1">
                <tr>
                    <th>Book Id</th>
                    <th>Course</th>
                    <th>Book Name</th>
                    <th>Title</th>
                </tr>
                <?php
                $con=mysqli_connect('localhost','root');
                mysqli_select_db($con,'libraryManagementSystem');
                $q="select *from books";
                $res=mysqli_query($con,$q);
                $num=mysqli_num_rows($res);
                for($i=1;$i<=$num;$i++)
                {
                    $row=mysqli_fetch_array($res);
                ?>
                <tr>
                    <td><?php echo $row['b_id']; ?></td>
                    <td><?php echo $row['course']; ?></td>
                    <td><?php echo $row['book_name']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                </tr>
                <?php                        
                }
                ?>
            </table>
        </div>
           
           <!-- search bar -->

        <div id="searchBar">
            <form action="http://localhost/gitHub/libraryManagementSystem/searchBar.php"method="post">
                <div>
                        <strong>Search books</strong>
                        <input type="search"name="search"id="value"placeholder="search"onkeyup="checkSearch()";/>
                </div>
            </form>
            <script>
                function checkSearch()
                {
                    var insert=document.getElementById('value').value.toUpperCase();
                    var tb=document.getElementById('tb1');
                    var tr=tb.getElementsByTagName('tr');
                    for(var i=0;i<tr.length;i++)
                    {
                        var td=tr[i].getElementsByTagName('td')[2];
                        if(td)
                        {
                            var value=td.innerHTML || textContent;
                            if(value.toUpperCase().indexOf(insert)>-1)
                            {
                                tr[i].style.display="";
                            }
                            else
                            {
                                tr[i].style.display="none";
                            }
                        }
                    }
                }
            </script>
        </div>

        <div id="logout">
            <a href="http://localhost/gitHub/libraryManagementSystem/collegeLogout.php">Logout</a>
        </div>
    </body>
</html>