<?php

$user='root';
$pass='';
$db='quest';

$con = mysqli_connect('127.0.0.1',$user,$pass) or die("Unable to connect");
mysqli_select_db($con,'quest') or die("Unable to connect to db");

$uname = $_POST['username'];
$pword = $_POST['password'];
$email = $_POST['email'];

$read = "SELECT * FROM user";
$result = mysqli_query($con,$read);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
        if($row['Email'] == $email){
            header("refresh:2; url=signUpErr.html");
        }
    }
}

$write = "INSERT INTO user (Email,Uname,Pword) VALUES ('$email','$uname','$pword')";

mysqli_query($con,$write);

header("refresh:2; url=test.html");

?>