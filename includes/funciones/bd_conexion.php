<?php
$conn = new mysqli('localhost','kevin','root','bd_renthouse');

if($conn->connect_error){
    echo $error -> $conn->connect_error;
}
?>