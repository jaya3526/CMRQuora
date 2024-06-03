<?php
require 'database.php';
if(isset($_GET["id"])){
    $id=$_GET["id"];
    $row=mysqli_query( $conn,"SELECT * FROM responses WHERE id=$id");
    $res=mysqli_fetch_assoc($row);
    $email=$res["email"];
    $message=$res["message"];

    $delete=mysqli_query( $conn,"DELETE FROM responses WHERE email='$email' and id='$id' and message='$message'");
    if($delete){
        echo "<script>alert('question deleted SUCCESSFULLY');</script>";
        header("Location:responses.php?id=$id");
    }
    else{
        echo "<script>alert('Failed to delete question try again');</script>"; 
    }
}
?>