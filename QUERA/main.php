<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            position: static;
        }
        .enter{
            width: 100%;
            height:50px;
            background-color: red;
        }
       #addques{
        text-decoration: none;
        border:2px solid black;
        border-radius: 5px;
        background-color: aqua;
       float: right;
      padding:10px;     
    width: fit-content;
    position: fixed;
    right: 0px;
    bottom: 0px;
    min-height: fit-content;
       }
       .questiondata{
        border: 2px solid black;
        padding: 10px;
        margin: 10px;
        background-color: #F8F8F8;
        color: black;
        width: 600px;
        height: 100px;
        line-height: 30px;
        font-size: large;
       }
       #button{
        margin: 1px;
        padding: 1px;
        float: inline-end;
        text-decoration: none;
        border: 1px solid black;  
        border-radius: 5px;
        background-color: aqua;
        color: black;
        cursor: pointer;
       }
       h4{
        white-space: -moz-pre-wrap !important;
         white-space: -pre-wrap;
         white-space: -o-pre-wrap;
         white-space: pre-wrap;
         word-wrap: break-word;
         word-break: break-all;
         white-space: normal;
       }
       .questions{
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        flex-flow: row wrap;
       }
       #addquestion{
        position: absolute;
        right:0px;
        bottom: 0px;
       }
       #back{
        border: 2px solid black;
            text-decoration: none;
            margin: 10px;
            padding: 10px;
            background-color: aqua;
            margin-top: 4px;
            border-radius: 5px;
            position: absolute;
       }
    </style>
</head>
<body>
    <div class="enter">
    <a id="logout" href="logout.php">LOG OUT</a>
    <a id="back" href="login.php">BACK</a>
</div>
<div id="addquestion">
    <a id="addques" href="question.php" >Add Question</a>
</div>
<div class="question<?php echo $r?>">
<h1>Questions:</h1></div>
<div class="questions">
<?php
require "database.php";
$result=mysqli_query($conn,"SELECT * FROM questionsdata");

if(mysqli_num_rows($result)>0){
$i=0;
while($row=mysqli_fetch_array($result)){ 
?>
<div class="questiondata">
    <p><?php echo $row["name"] ?> &nbsp;&nbsp;&nbsp;<spam><?php echo $row["email"] ?> </spam>
    <a id="button" href="edit.php?id=<?php echo $row['id']?>">Edit</a><dr><a id="button" href='delete.php?id=<?php echo $row['id']?>'>Delete</a><dr>
    <h4><?php echo $row["message"] ?></h4>
    <a id="button" href="responses.php?id=<?php echo $row['id'] ?>">See Responses</a>
</div>
<?php
$i++;
}
?>
<?php 
}
else{
    echo"No data found";
}
?>
</div>
</body>
</html>