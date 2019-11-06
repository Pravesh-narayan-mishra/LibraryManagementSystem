<!doctype html>
<html>
    <head>
</head>
<body>
    <input type="text"name=""id="insertt"placeholder="search"onkeyup="searchFun()"/>
    <div id="div1">
        <h2 style="text-decoration :underline">Your All Books</h2>
            <form>
            <table border="2px"cellspacing="0px"cellpadding="10px"id="tb1"id="tb1">
                <tr>
                    <th>Book Id</th>
                    <th>Course</th>
                    <th>Book Name</th>
                    <th>Title</th>
                    <th>Issue</th>
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
                    <td><input type="checkbox"name="ch<?php echo $i;?>"/></td>
                </tr>
                <?php                        
                }
                ?>
                <tr>
                   <td><input type="submit"/></td>
                </tr>
            </table>
            </form>
    </div>
    <script>
        function searchFun()
        {
            var insertt=document.getElementById('insertt').value.toUpperCase();
            var tb=document.getElementById('tb1');
            var tr=tb.getElementsByTagName('tr');
            for(var i=0;i<tr.length;i++)
            {
            var td=tr[i].getElementsByTagName('td')[2];
            if(td)
            {
                var textvalue = td.innerHTML || td.textcontent;
                if(textvalue.toUpperCase().indexOf(insertt) > -1)
                  {
                    tr[i].style.display = "";
                  }
                  else
                  {
                      tr[i].style.display="none";
                  }
            }
            }
        }
    </script>
</html>
