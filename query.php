<?php
$servername="localhost";
$username="root";
$password="";
$dbname="register";
$conn= new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}

    $query=$_POST["query"];
 $sql= "INSERT INTO queries(UserQuery) VALUES('$query')";
    if($conn->query($sql) == TRUE) {
        echo "Registration successful.";
    }
    else {
        echo "ERROR:." .$sql. "<br>". $conn->error;
    }

$conn->close();
?>