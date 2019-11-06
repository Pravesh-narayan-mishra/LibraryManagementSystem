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
        <title>College Library Page</title>
        <style type="text/css">
           *
           {
               padding :0px;
               margin :0px;
           }
           .menu
           {
              position :fixed;
              top :0px;
              height :100px;
              width :100%;
              background-color :rgba(0,0.5,2,0.7);
              z-index :1;
           }
           #leftMenu
           {
               width :25%;
               height :100px;
               float :left;
                           
           }
           #leftMenu h1
           {
               padding-left :20px;
               color :white;
               font :italic bold 27px georgia;
               padding-top :30px;
               text-shadow :2px 2px 2px pink;

           }
           #rightMenu
           {            
               width :75%;
               height :100px;
           }
           #rightMenu div
           {
               padding-left :40px;
               padding-top :50px;
               display :inline-block;  
               font :italic bold 15px georgia;                 
           }
           #rightMenu div a:link,a:visited
           {
               color :white;
               text-decoration :none; 
           }
           #rightMenu a:hover
           {
               color :pink;
               text-decoration :underline;
           }

           .container
           {
               position :relative;
           }
           #bookRecordInsertionForm
           {
               position :absolute;
               top :110px;
               padding :20px;
               margin :20px;
               border :2px solid red;
               border-radius :20px;
               width :260px;
               background-color :pink;
               font :italic bold 16px/20px georgia;
           }
           #bookRecordInsertionForm input
           {
               display :inline-block;
               height :25px;
               width :200px;
               margin :3px;
           }
           
           #registrationForm
           {
               position :absolute;
               top :120px;
               left :700px;
               border :2px solid red;
               border-radius :20px;
               background-color :pink;
               font :italic bold 16px georgia;
               padding :20px;
           }
           #registrationForm input
           {
               width :300px;
               height :25px;
               margin :3px;
           }
           #bookIssue
           {
              position :absolute;
              top :400px;
              margin :20px;
              padding :20px;
              border :2px solid red;
              border-radius :20px;
              background-color :pink;
              font :italic bold 15px georgia;           
           }
           #bookIssue input
           {  
               height :25px;
               width :260px;
               display :block;
               margin :7px;
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
         <div id="leftMenu">
            <h1>College Library Page</h1>
         </div>

         <div id="rightMenu">

            <!-- that use to view all books -->

            <div id="viewBooks">
                <a href="http://localhost/gitHub/libraryManagementSystem/bookView.php">View All Books</a>
            </div>

            <!-- that use to view all student -->

            <div id="viewAllStudent">
                <a href="http://localhost/gitHub/libraryManagementSystem/viewAllStudents.php">View all student</a>
            </div>
        
            <!-- that use to update data -->

            <div id="bookRecordUpdationForm">
               <a href="http://localhost/gitHub/libraryManagementSystem/bookUpdateForm.php">Update Books</a>
            </div>

            <!-- that use to delete data -->

            <div id="bookRecordDeletionForm">
               <a href="http://localhost/gitHub/libraryManagementSystem/bookDeleteForm.php">Delete Book Record</a>
            </div>
         </div> 
        </div>

        <div class="container">

        <div id="bookRecordInsertionForm">
            <h2>Insert New Book</h2>
            <form action="http://localhost/gitHub/libraryManagementSystem/bookInsertion.php"method="POST">
              <table>
                <tr>
                    <th>Course</th>
                    <td><input type="text"name="course"class="inputcss"/></td>               
                </tr>
                <tr>
                    <th>Name</th>
                    <td><input type="text"name="b_name"class="inputcss"required/></td>                
                </tr>
                <tr>
                    <th>Author</th>
                    <td><input type="text"name="author"class="inputcss"/>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit"value="Save"class="inputcss"/></td >
                </tr>
              </table>
            </form>
        
            <!--  that use to view insertion result -->

          <div id="printResult">
              <?php
              if(isset($_SESSION['saved']))
              {
                  echo "Data saved";
              }
              ?>
          </div>
        </div>
             <!-- that is use to view registration form -->

        <div id="registrationForm">
             <h2>Register New student</h2>
            <form action="http://localhost/gitHub/libraryManagementSystem/validateRegistrationNewStudentForm.php"method="POST"onsubmit="return checkRegistrationForm()">
                <table>
                    <tr>
                        <th>Name</th>
                        <td><input type="text"name="name"required/></td>
                    </tr>
                    <tr>
                        <th>Father Name</th>
                        <td><input type="text"name="fatherName"required/></td>
                    </tr>
                    <tr>
                        <th>Course</th>
                        <td><input type="text"name="course"required/></td>
                    </tr>
                    <tr>
                        <th>Year</th>
                        <td><input type="text"name="year"required/></td>
                    </tr>
                    <tr>
                        <th>semester</th>
                        <td><input type="text"name="sem"/></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><input type="text"name="email"required/></td>
                    </tr>
                    <tr>
                        <th>Mobile no.</th>
                        <td><input type="number"name="mobile_no"required/></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><input type="text"name="address"required/></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input type="password"name="password"required/></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><input type="submit"value="Register"/></td>
                    </tr>
                </table>
            </form>
            <script>
                function checkRegistrationForm()
                {
                    var result=true;
                    var x=document.getElementsByName("email")[0].value;                  
                    var atindex=x.indexOf('@');
                    var dotindex=x.indexOf('.');
                    if(atindex<=1 ||dotindex>=x.length-3 || dotindex-atindex<=2)
                    {
                        result=false;
                        return(result);
                    }                 
                }
            </script>

            <div id=printResult>
                <?php
                if(isset($_SESSION['reg']))
                {
                    echo "Student Registerd";
                }
                ?>
            </div>
        </div>  
        
         <!-- book issue form -->

        <div id="bookIssue">
          <h2>Book Issue Form</h2>
            <form action="http://localhost/gitHub/libraryManagementSystem/bookIssue.php"method="POST"onsubmit="return checkk()">
                <div>
                    <strong>Enter student Id</strong><br/>               
                    <input type="number"name="s_id"id="myinp"required/>
                    <input type="submit"value="submit"/>
                </div>
            </form>
        </div>

               <!--  in this statement we have a problem -->
        <script>
           function checkk()
           {
               var x=document.getElementById("myinp").value;
               var req=new XMLHttpRequest();
               req.open("GET","http://localhost/gitHub/libraryManagementSystem/checkId.php?v="+x,true);
               req.send();   
               req.onreadystatechange=function()
               {
                   if(req.readyState==4 && req.status==200)
                   {
                    c=req.responseText;
                    document.getElementById("ddie").innerHTML=req.responseText;
                   }
               }
               if(document.getElementById('ddie').innerHTML==false)
               {
                 return(false);
               }
           }               
        </script>
        <div id="logout">
            <a href="http://localhost/gitHub/libraryManagementSystem/collegeLogout.php">Logout</a>
        </div>
      </div>
    </body>
</html>