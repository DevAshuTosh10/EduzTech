<?php
$servername="localhost";
$username="root";
$password="";
$dbname="register";
$conn= new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name=$_POST["name"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    $subjectcode= $_POST["subjectcode"];
    if(strlen($password)<8){
        die("Password should be atleast 8 characters long.");
    }
    $hashedPassword = password_hash($password,PASSWORD_BCRYPT);
    $sql= "INSERT INTO user(name,email,password,subjectcode) VALUES('$name','$email','$password','$subjectcode')";
    if($conn->query($sql) == TRUE) {
        echo "Registration successful.";
    }
    else {
        echo "ERROR:." .$sql. "<br>". $conn->error;
    }
}
$conn->close();
?>