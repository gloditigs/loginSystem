<?php
session_start();
    include("connection.php");
    include("functions.php");
    
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        
        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            // save to database
            $user_id = random_num(100);
            $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";
            
            mysqli_query($con, $query);
            
            header("Location: login.php");
            die;
        }else
        {
            echo "Please enter valid information!";
        }
    }
   
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>

<body>

    <style type="text/css">
    #text {
        border-radius: 10px;
        height: 25px;
        padding: 4px;
        width: 100%;
        background: none;
        border: solid thin black;
    }

    #button {

        padding: 10px;
        width: 100px;
        color: white;
        background-color: black;
        border-radius: 50px;
        border: none;
        width: 100%;
    }

    #box {
        margin: auto;
        width: 300px;
        padding: 20px;
        margin-top: 150px;
        border-radius: 50px;
        background-color: lightpink;
    }
    </style>

    <div id="box">
        <form method="post">
            <div style="
            font-size: 20px;
            margin: 10px;
            color: white;
            text-align: center;">SIGNUP</div>

            <input id="text" type="text" placeholder="Create Username" name="user_name"><br><br>
            <input id="text" type="password" placeholder="Create Password" name="password"><br><br>

            <input id="button" type="submit" value="signup"><br><br>

            <p>Already have an account?<a href="/loginsystem/login.php">login</a></p>
        </form>
    </div>

</body>

</html>