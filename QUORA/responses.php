<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responses</title>
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
        .questiondata{
        border: 2px solid black;
        padding: 10px;
        margin: 10px;
        background-color: #F8F8F8;
        color: black;
        width: 600px;
        height: 80px;
        line-height: 25px;
        font-size:large;
        }
        #respbutton{
            float: right;
        }
        .questiondatas{
         border: 2px solid black;
        padding: 10px;
        margin: 10px;
        background-color: #F8F8F8;
        color: black;
        width: 600px;
        height: 80px;
        line-height: 25px;
        font-size:large;
        margin-left: 100px;
        }
        #button{
        margin: 1px;
        padding: 1px;
        float: inline-end;
        text-decoration: none;
        border: 1px solid black;  
       }
       .response{
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        flex-flow: row wrap;
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
       #respbutton{
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
    </style>
</head>
<body>
<div class="enter">
    <a id="logout" href="logout.php">LOG OUT</a>
    <a id="back" href="main.php">BACK</a>
</div>
<div class="question">
    <h1>Question</h1>
    <?php
    require "database.php";
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $res=mysqli_query($conn,"SELECT * FROM questionsdata WHERE id='$id' ") or die(mysqli_error($conn));
        $row=mysqli_fetch_array($res);
        $id = $row["id"];
        $name= $row["name"];
        $email= $row["email"];
        $message= $row["message"];
    ?>
    <div class="questiondata">
    <p><?php echo $row["name"] ?> &nbsp;&nbsp;&nbsp;<spam><?php echo $row["email"] ?> </spam><dr>
    <h4><?php echo $row["message"] ?></h4>
    <a href="addResponses.php?id=<?php echo $id ?>" id="respbutton" type="button">ADD RESPONSE</a>
</div>
<?php
    }
?>
</div>
<div class="response">
<?php
$result=mysqli_query($conn,"SELECT * FROM responses where id='$id'");

if(mysqli_num_rows($result)>0){
$i=0;
while($row=mysqli_fetch_array($result)){ 
?>
<div class="questiondatas">
    <p><?php echo $row["name"] ?> &nbsp;&nbsp;&nbsp;<spam><?php echo $row["email"] ?> </spam>
    <h4><?php echo $row["message"] ?></h4>
    <a id="button" href="deleteresponses.php?id=<?php echo $id ?>">Delete Responses</a>
</div>
<?php
$i++;
}
?>
<?php 
}
else{
    echo"<h1>No data found</h1>";
}
?></div>
</body>
</html>