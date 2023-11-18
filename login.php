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
            // read from database
            $query = "select * from users where user_name = '$user_name' limit 1";
            $result = mysqli_query($con, $query);
            
            if($result)
            {
                if ($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] === $password)
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                         die;
                    }
                }
            }
            
            echo "Wrong user name or password!";
        }else
        {
            echo "Wrong user name or password!";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
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
        background-color: pink;
    }
    </style>

    <div id="box">
        <form method="post">
            <div style="
            font-size: 20px;
            margin: 10px;
            color: white;
            text-align: center;">LOGIN</div>

            <input id="text" type="text" placeholder="Enter Username" name="user_name"><br><br>
            <input id="text" type="password" placeholder="Enter Password" name="password"><br><br>

            <input id="button" type="submit" value="login"><br><br>

            <p>don't have an account?<a href="/loginsystem/signup.php">Signup</a></p>
        </form>
    </div>
</body>

</html>