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
        <title>Book Update Form</title>
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
          #searchBar
          {
              position :absolute;
              top :120px;
          }
            #tb1
            {
                position :relative;
                top :140px;
                width :80%;
                border-collapse :collapse;
            }
            #tb1 th,td
            {
                border :2px solid #aaad;
                padding :8px;
            }
            #tb1 td input
            {
                width :100%;
            }
            #tb1 th
            {
                background-color :gray;
            }
            #tb1 tr:nth-child(even)
            {
                background-color :#ddf2f2;
            }
            #tb1 tr:hover
            {
                background-color :#f2f2dd;
            }
            #logout
           {
               position :absolute;
               top :690px;
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
        <h2>Update Your Books</h2>
    </div>

    <div id="searchBar">
        <strong>Search Book</strong>
        <input type="text"name="searchBar"onkeyup="searchBar()"/>

        <script>
            function searchBar()
            {
                var insert=document.getElementsByName("searchBar")[0].value.toUpperCase(); 
                var table=document.getElementById("tb1");
                var tr=table.getElementsByTagName("tr");
                for(var i=0;i<tr.length;i++)
                {
                    var td=tr[i].getElementsByTagName("td")[2];
                    if(td)
                    {                      
                       var inp=td.getElementsByTagName("input")[0].value;
                       if(inp.toUpperCase().indexOf(insert)>-1)
                       {
                           tr[i].style.display="";
                       }
                       else
                       tr[i].style.display="none";                                    
                    }
                    
                }
            } 
        </script>
    </div>
    
    <div id="updateForm">
            <form action="http://localhost/gitHub/libraryManagementSystem/bookUpdation.php"method="POST">
                <table id="tb1">
                    <tr>
                        <th>Book Id</th>
                        <th>Course</th>
                        <th>Book Name</th>
                        <th>Author</th>
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
                           <td><?php echo $row['b_id'];?>
                           <input type="hidden"name="b_id<?php echo $i;?>"value="<?php echo $row['b_id'];?>"/></td>
                           <td align="center"><input type="text"name="course<?php echo $i;?>"value="<?php echo $row['course'];?>"/></td>
                           <td align="center"><input type="text"name="b_name<?php echo $i;?>"value="<?php echo $row['book_name'];?>"/></td>
                           <td align="center"height="20px"><input type="text"name="author<?php echo $i;?>"value="<?php echo $row['author'];?>"/></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td colspan="4"align="center"><input type="submit"value="Update"/></td>
                    </tr>
                </table>
            </form>
            <div>
            <?php
              if(isset($_SESSION['up']))
                {
                  echo "Updation successfull";
                }
            ?>
            </div>
        </div>

        <div id="logout">
            <a href="http://localhost/gitHub/libraryManagementSystem/collegeLogout.php">Logout</a>
        </div>
    </body>
</html>