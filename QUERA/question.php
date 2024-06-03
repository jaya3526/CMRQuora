<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>question</title>
    <style>
          *{
            padding: 0px;
            margin: 0px;
        }
        #logout{
            border: 2px solid black;
            text-decoration: none;
            margin: 10px;
            padding: 10px;
            background-color: aqua;
            margin-top: 4px;
            float: right;
            border-radius: 5px;
        }
        .enter{
            width: 100%;
            height:50px;
            background-color: red;
        }
         #ques{
           height:100px; 
        }
        .container{
            line-height: 50px;
            padding: 20px;
            margin: 20px;
        }
        #submit{
            padding:5px;
            background-color: aquamarine;
            border-radius: 5px;
        }
        form{
            margin-left:500px;
            font-size: 20px;
        }
        input{
            width: 150px;
            height: 30px;
        }
        #ques{
            width: 450px;
            height: 250px;
        }
    </style>
</head>
<body>
<div class="enter">
    <a id="logout" href="logout.php">LOG OUT</a>
</div>
<div class="container" id="newQuestion">
    <?php 

    require 'database.php';
    if(mysqli_connect_errno()){
        echo "". mysqli_connect_error();
    }
    if(isset($_POST["submit"])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $message=$_POST['ques'];
        if(!$mess=""){
        $sql="INSERT INTO questionsdata(name, email,message)
         VALUES ('$name','$email','$message')";
         if(mysqli_query($conn,$sql) ){
            header("Location:main.php");
         }
         else{
            echo "<script>alert('Fill all fields');</script>";
         }
        }
    }
  ?>

    <form autocomplete="off" method="POST" onsubmit="return register()">
        <label for="name">name</label>
        <input type="text" name="name" id="name" placeholder="enter your name" required>
        <label for="email"> Email</label>
        <input type="text" name="email" id="email" placeholder="Enter college email" required><br>
        <label for="Question">Enter question:</label><br>
        <textarea type="text" name="ques" id="ques"></textarea>
        <br>
        <input type="submit" id="submit"  name="submit">
    </form>
</div>
<script>
function register(){
    var e=document.getElementById('email').value;
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
return true;
}
</script>
</body>
</html>