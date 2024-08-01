<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMR QUORA</title>
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <style>
        *{
            padding:0px;
            margin: opx;
        }
        .container{
    margin: 5px;
    padding: 5px;
    margin-left:40%;
    margin-top:100px;
    
}
#forms{
    position: absolute;
    border: 2px solid transparent;
    display:block;
    font-size: larger;
    padding: 10px;
    line-height: 30px;
    width: fit-content;
    border-radius: 5px;
    background-color: azure;
    box-shadow: rgba(0,0,0,0.5);
}
#x{
 position: absolute;
 left: 275px;
cursor: pointer;
}
#button{
    padding: 5px;
    border-radius: 5px;
    background-color: rgb(152, 222, 222);
}
input{
    width: 350px;
    height:30px;
}
    </style>
</head>
<body>
<div class="container" id="lm">
    <?php 
    if(isset($_POST["button"])){
        $email=$_POST["email"];
        $password=$_POST["password"];
        require "database.php";
        $result=mysqli_query($conn,"SELECT * FROM studentsdata WHERE email='$email'");
        $row=mysqli_fetch_array($result);
        if(mysqli_num_rows($result)> 0){
            if($password ==$row["password"]){
                    $_SESSION["login"] = "true";
                    $_SESSION["id"] = $row["id"];
                    header("Location:main.php");
            }
            else{
                echo "<script>alert('Password wront please try again');</script>";
            }
        }else{
            echo "<script>alert('User not registered');</script>";
        }
    }
    ?>
    <form  method="post" id="forms" autocomplete="off" action="">
        <label for="email">ENTER EMAIL</label><br>
        <input type="text" name="email" id="email">
        <br>
        <label for="password">PASSWORD</label><br>
        <input type="password"name="password" id="password">
        <br>
        <input type="submit" id="button" name="button"  value="ENTER">
        <br>
        <p>If new user register before login.<a href="register.php">REGISTERHERE</a></p>
    </form></div>
    
</body>
</html>