<?php
	$mysql_host='localhost';
	$mysql_user='root';
	$mysql_password='';
	$mysql_database='busspass';

	$conn = new mysqli($mysql_host, $mysql_user, $mysql_password,$mysql_database);
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
	if(isset($_POST['signup']))
    {
        $name=$_POST['name'];
        $pass=$_POST['password'];
        $emailid=$_POST['email'];

        $sql = "INSERT INTO users (name,email, password)VALUES ('$name', '$emailid', '$pass')";
        if ($conn->query($sql) === TRUE) {
          echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.location.href='http://localhost/Buspass/index/dashboard.html';
                   </SCRIPT>");
            }

    }

    $conn->close();
?>