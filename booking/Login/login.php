<?php
    session_start();
    $mysql_host='localhost';
	$mysql_user='root';
	$mysql_password='';
	$mysql_database='busspass';

	$conn = new mysqli($mysql_host, $mysql_user, $mysql_password,$mysql_database);

    if(isset($_POST['email']))
    {
        $pass=$_POST['password'];
        $emailid=$_POST['email'];

        $sql = "select * from users where email ='$emailid'";
        $result = $conn->query($sql) or die("Unsucess");

        if ($result ->num_rows > 0) {
            $r = mysqli_fetch_array($result);
            if($pass == $r['password']){
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                 alert('Login Succesfull!');
                window.location.href='http://localhost/Buspass/booking/book.php';
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