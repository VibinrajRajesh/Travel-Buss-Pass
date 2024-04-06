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
if(isset($_POST['submit']))
{
    $passno=mt_rand(100000000, 999999999);
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phoneno = $_POST['phone'];
    $idtype=$_POST['id'];
    $idno=$_POST['idno'];
    $source = $_POST['from'];
    $dest=$_POST['to'];
    $period=$_POST['choice'];

    $sql = "INSERT INTO booking (passno,name,email,phoneno,idtype,idno,source,destination,period)
    VALUES ('$passno', '$name', '$email','$phoneno','$idtype','$idno','$source','$dest','$period')";
    if ($conn->query($sql) === TRUE) {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                alert('Your Pass Number is $passno Please go to view pass and take print of pass.');
                window.location.href='http://localhost/Travel%20Buss%20Pass/index/index.html';
                   </SCRIPT>");
    }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bus Pass</title>
    <link rel="stylesheet" type="text/css" href="bookstyle.css">
    <link rel="icon" type="image/png" href="../favicon.png">
    <script src="https://kit.fontawesome.com/d44e9fa9cc.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">

    <h1 class="header1">Travel Bus Pass</h1>
    <a href="..\Login\logout.php"><img id="logout" src="logout.png" width="-14%" height="30vh" title="Logout"/></a>
    <nav>
        <ul>
            <li><a href="../index/index.html">Home</a></li>
            <li><a href="../index/index.html#about">About</a></li>
            <li><a href="View Pass/search.php">View Pass</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>
    <div class="form">
        <h1>New Pass</h1>
        <p>Enter Your Details</p>
        <form class="form2" action="book.php" method="post">
            Name:<input type="text" placeholder="Enter Full Name" name="name"><br><br>
            Email id:<input type="email" placeholder="Enter Email Id" name="email"><br><br>
            Phone no:<input type="text" placeholder="Enter Your Phone number" name="phone"><br><br>
            Identity Type:<select name="id">
                <option value="Choose Identity Type">Choose Identity Type</option>
                <option value="Adhaar Card">Adhaar Card</option>
                <option value="Voter Id">Voter Id</option>
                <option value="Pan card">Pan Card</option>
                <option value="Driving License">Driving License</option>
                <option value="Passport">Passport</option>
                <option value="Student Card">Student Card</option>
                <option value="Official">Any Official Card</option>
            </select><br><br>
            Identity Card No.<input type="text" placeholder="Enter Identity Number" name="idno"><br><br>
            Source:<select id="source" name="from">
                <option value="Choose Identity Type">Choose Destination</option>
                <option value="Airoli">Airoli</option>
                <option value="Ghansoli">Ghansoli</option>
                <option value="Kopar Khairne">Kopar Khairne</option>
                <option value="Juhu Nagar">Juhu Nagar</option>
                <option value="Vashi">Vashi</option>
                <option value="Turbhe">Turbhe</option>
                <option value="Sanpada">Sanpada</option>
                <option value="Juinagar">Juinagar</option>
                <option value="Nerul">Nerul</option>
                <option value="Darave">Darave</option>
                <option value="Karave Nagar">Karave Nagar</option>
                <option value="CBD Belapur">CBD Belapur</option>
                <option value="Kharghar">Kharghar</option>
                <option value="Kamothe">Kamothe</option>
                <option value="New Panvel">New Panvel</option>
                <option value="Kalamboli">Kalamboli</option>
                <option value="Ulwe">Ulwe</option>
                <option value="Dronagiri">Dronagiri</option>
                <option value="Taloja">Taloja</option>
            </select>

            Destination:<select id="dest" name="to">
                <option value="Choose Identity Type">Choose Source Destination</option>
                <option value="Choose Identity Type">Choose Destination</option>
                <option value="Airoli">Airoli</option>
                <option value="Ghansoli">Ghansoli</option>
                <option value="Kopar Khairne">Kopar Khairne</option>
                <option value="Juhu Nagar">Juhu Nagar</option>
                <option value="Vashi">Vashi</option>
                <option value="Turbhe">Turbhe</option>
                <option value="Sanpada">Sanpada</option>
                <option value="Juinagar">Juinagar</option>
                <option value="Nerul">Nerul</option>
                <option value="Darave">Darave</option>
                <option value="Karave Nagar">Karave Nagar</option>
                <option value="Passport">CBD Belapur</option>
                <option value="Kharghar">Kharghar</option>
                <option value="Kamothe">Kamothe</option>
                <option value="New Panvel">New Panvel</option>
                <option value="Kalamboli">Kalamboli</option>
                <option value="Ulwe">Ulwe</option>
                <option value="Dronagiri">Dronagiri</option>
                <option value="Taloja">Taloja</option>
            </select><br><br>
            <input type="radio" id="1month" name="choice" value="1month" onclick='document.getElementById("demo").innerHTML = "310"'>
              <label for="1month">1 Month</label>
              <input type="radio" id="3month" name="choice" value="3month"onclick='document.getElementById("demo").innerHTML = "610"'>
              <label for="3month">3 Month</label><br><br>
            Cost:<p id="demo" name="cost"></p>
            <input type="submit" value="submit" name="submit" >
        </form>
    </div>
    <footer id="contact">
        <div class="footer-content">
            <div class="content1">
                <h1 class="foot-text">Travel Buss Pass</h1>
                <p class="foot-text">For queries:<br>Contact no:&nbsp 022 2754123<br>Email me on:&nbsptravelbus@gmail.com</p>
                <h1 class="foot-text2">Social Media Links</h1>
                <div class="facebook">
                    <a href=""><i class="fab fa-facebook" style="font-size:4rem; color:#fff;"></i></a>
                </div>
                <div class="instagram">
                    <a href=""><i class="fab fa-instagram" style="font-size:4rem; color:#fff;"></i></a>
                </div>
                <div class="twitter">
                    <a href=""><i class="fab fa-twitter" style="font-size:4rem; color:#fff;"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            &copy;Copyright 2021-22 | Designed by Vibinraj Rajesh
        </div>
    </footer>
</div>
</body>
</html>

