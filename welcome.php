<?php
include 'connect.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $errors=array();
    // validate username
    if(empty ($_POST['name'])){
        $errors[]=  "enter your name";
    }
    else {
        $name=$_POST['name'];
    }
    //vaidate email
    if(empty ($_POST['email'])){
        $errors[]="Enter your email";
    }
    else {
        $email=$_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[]= "ivalid email format";
        }
    }
    //validate password
    if(empty ($_POST['password'])){
        $errors[]="enter your password";
    }else {
        $password=$_POST['password'];
    if (strlen($password)<=6) {
        $errors[]="password must be 6 digits";
    }
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    //inserting values
    if(empty ($errors)){
        $stmt = $db -> prepare("insert into student(name,email,password) VALUES (?,?,?)");
        $stmt ->bind_param("sss", $name,$email,$password);
        $stmt -> execute();
        $stmt -> close();
    }else {
        echo "<h1>Errors:</h1>;
        <p>These erros occured: <br>";
        foreach($errors as $msg){
            echo "$msg <br>";
        }
        echo " </p> <p>Please try again</p>";
    }
}
?>