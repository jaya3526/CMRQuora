<?php
require 'database.php';
if(isset($_GET["id"])){
    $id=$_GET["id"];
    $delete=mysqli_query( $conn,"DELETE FROM `questionsdata` WHERE `id`='$id'");
    if($delete){
        echo "<script>alert('question deleted SUCCESSFULLY');</script>";
        header("location:main.php");
    }
    else{
        echo "<script>alert('Failed to delete question try again');</script>"; 
    }
}
?>