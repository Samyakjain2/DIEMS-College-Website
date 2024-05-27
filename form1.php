<?php
$username = $_POST['username'];
$email = $_POST['email'];
$comment = $_POST['comment'];

// Database connection
$conn = new mysqli('localhost','root','','comment');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into comments(username, email, comment)values(?,?,?)");
    $stmt->bind_param("sss",$username,$email,$comment);
    $stmt->execute();
    echo "Thank you for your comment...!";
    $stmt->close();
    $conn->close();
}
?>