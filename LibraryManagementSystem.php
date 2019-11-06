<!doctype html>
<html>
    <head>
        <title>Login page</title>
        <style type="text/css">
            *
            {
                margin :0px;
                padding:0px;
            }
            body
            {
                background-color :#fcd ;
            }
            .menu
            {
                position :fixed;
                top :0px;
                height :100px;
                width :100%;
                background-color :rgba(0,0.5,2,0.7);
            }
            .menu h2
            {
                text-align :center;
                padding-top :30px;
                color :white;
                font-size :40px;
                text-shadow :3px 3px 3px pink;
            }
            #viewForm
            {
                position :relative;
                border: 2px solid #ffaabb;
                border-radius: 10px;
                background-color :rgba(115, 102, 170, 0.473);
                padding: 20px;
                margin: 200px;
                width: 300px;
            }
            #viewForm div
            {
                margin: 5px;
            }
            input
            {
                display: inline;
                width: 100%;
                height: 30px;
            }         
        </style>
    </head>
    <body>
       <div class="menu">
           <h2>Library login page</h2>
       </div>
        <div id="viewForm">
          <h3>College Login</h3>
            <form action="http://localhost/gitHub/libraryManagementSystem/collegeLoginValidation.php"method="POST">
                <div>
                    <lable>Name</lable>
                    <input type="text"name="name"placeholder="Enter user name"/>
                </div>
                <div>
                    <lable>Password</lable>
                    <input type="password"name="password"placeholder="Enter your password"/>
                </div>
                <div>
                    <input type="submit"value="Login"/>
                </div>
            </form>
        </div>
    </body>
</html>
