<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMR QUORA</title>
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <style>
        *{
            padding: 0px;
            margin:0px;
        }
        #button{
    padding: 5px;
    border-radius: 5px;
    background-color: rgb(152, 222, 222);
}
#rx{
    position: absolute;
    left: 900px;
    cursor: pointer;
   }
#rforms{
    display:block;
    font-size: larger;
    padding: 10px;
    line-height: 30px; 
    width: fit-content;
    border-radius: 5px; 
    background-color: azure;
    box-shadow: rgba(0,0,0,0.5);
    border: 2px solid transparent;
}
.containers{
    margin: 5px;
    padding: 5px;
    margin-left:35%;
    margin-top:100px;
}
input{
    width: 350px;
    height:30px;
}
    </style>
</head>
<body>
    <div class="containers" id="rm">
        <?php
        if(isset($_POST["submit"])){
            $name=$_POST["name"];
            $email=$_POST["email"];
            $password=$_POST["password"];
            $password_confirm=$_POST["confirmpassword"];
            require "database.php";
                $sql="INSERT INTO studentsdata(name, email, password) VALUES ('$name','$email','$password')";
                if(mysqli_query($conn,$sql)){
                    echo "<script>alert('Registration Success');</script>";
                }
                else{
                 
                  echo "<script>alert('Email already exist');</script>";
                }
            }
        
   ?>

        <form  method="post" id="rforms" >
            <label for="name">ENTER NAME:</label><br>
            <input type="text" name="name" id="rname" required>
            <br>
            <label for="email">EMAIL:</label><br>
            <input type="text" name="email" id="remail" placeholder="abc@cmrcet.ac.in" required>
            <br>
            <label for="password">PASSWORD:</label><br>
            <input type="password" name="password" id="rpassword" required>
            <br>
            <label for="conformPassword">CONFORM PASSWORD:</label><br>
            <input type="password" name="confirmpassword" id="rcpassword" required>
            <br>
            <input type="submit" id="button" onclick="register()" name="submit" value="SUBMIT">
            <br>
       
        <div>
            <div><p>ALready REGISTERED<a href="login.php">LOGIN HERE</a></p></div>
    </div> </form>
    <script>

        function register(){
            var p=document.getElementById('rpassword').value;
            var cp=document.getElementById('rcpassword').value;
            var e=document.getElementById('remail').value;
            let a=0;
            e=e.split('@');
            for(let i=0;i<e.length;i++){
                if(e[i]=='cmrcet.ac.in')
                {
                    a=1;
                }
            }
            if(a===0){
            alert("Email need to college email");
            return false;
            }
            if(p!==cp){
            alert("need to have same password");
            return false;
        }
        return true;
        }
    </script>
   
</body>
</html>