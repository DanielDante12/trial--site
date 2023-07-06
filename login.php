<?php
include_once 'connect.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['name'];
    $password = $_POST['password'];

    // Retrieve data
    $stmt = $db->prepare("SELECT * FROM student WHERE  'name' = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Log the user in
            $_SESSION['name'] = $user['name'];
            header('location:home.php');
            exit; // Ensure the script stops execution after redirection
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Invalid name";
    }

    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="name" placeholder="enter name"><br>
        <input type="password" name="password" placeholder="enter pass"><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>