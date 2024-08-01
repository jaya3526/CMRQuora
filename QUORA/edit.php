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
<din class="container" id="newQuestion">
    <?php 
    require 'database.php';
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        $result=mysqli_query($conn,"SELECT * FROM questionsdata WHERE id=$id");
        $row=mysqli_fetch_assoc($result);
        $name = $row["name"];
        $email = $row["email"];
        $message = $row["message"];
    ?>
   <form  method='POST' >
        <label for='name'>name</label>
        <input type='text' name='name' id='name' value=<?php echo $name; ?>  required>
       <label for='email'> Email</label>
        <input type='text' name='email' id='email' value=<?php echo $email; ?> required><br>
    <label for='Question'>Enter question:</label><br>
    <textarea type='text' name='ques' placeholder=<?php echo $message; ?> id='ques'></textarea>
        <br>
        <input type='submit' id='submit' name='submit'>
    </form></body></html>";
   <?php
    }

    if(isset($_POST["submit"])){
        $id=$_GET["id"];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $message=$_POST['ques'];
        if($message!=""){
        $sql="UPDATE questionsdata SET name='$name',email='$email',message='$message' WHERE id='$id'";
         if(mysqli_query($conn,$sql) ){
            header("Location:main.php");
         }else{
            echo"";
         }
    }else{
        header("location:main.php");
    }
}
    ?>
</din>
</body>
</html>