<?php
	session_start();
	session_unset();
	header('location:http://localhost/Buspass/admin/index.php');
?>