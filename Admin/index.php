<?php
session_start();
$mysql_host='localhost';
$mysql_user='root';
$mysql_password='';
$mysql_database='busspass';

$conn = new mysqli($mysql_host, $mysql_user, $mysql_password,$mysql_database);

if(isset($_POST['login']))
{
    $pass=$_POST['password'];
    $name=$_POST['username'];

    $sql = "select * from users where name ='$name'";
    $result = $conn->query($sql) or die("Unsucess");

    if ($result ->num_rows > 0) {
        $r = mysqli_fetch_array($result);
        if($pass == $r['password']){
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                 alert('Login Succesfull!');
                window.location.href='http://localhost/Travel%20Buss%20Pass/Admin/dashboard.php';
                   </SCRIPT>");
        }
        else{
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('UnSuccessfull Login');
                   </SCRIPT>");
        }
    }
    else{
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('You Have not Registered.');
                </script>");
    }

}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Admin Login - Travel Bus Pass</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper">
    <div class="title">
        Admin Login Form
    </div>
    <form action="index.php" method="post">
        <div class="field">
            <input type="text" id="name" name="username" required>
            <label>UserName</label>
        </div>
        <div class="field">
            <input type="password" id="pass" name="password"required>
            <label>Password</label>
        </div>
        <div class="field">
            <input type="submit" value="Login" name="login">
        </div>
    </form>
</div>
</body>
</html>
