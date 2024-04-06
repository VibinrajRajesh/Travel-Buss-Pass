<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bus Pass</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="../favicon.png">
    <script src="https://kit.fontawesome.com/d44e9fa9cc.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">

    <h1 class="header1">Travel Bus Pass</h1>
    <a href="..\Login\logout.php"><img id="logout" src="logout.png" width="-14%" height="30vh" title="Logout"/></a>
    <nav>
        <ul>
            <li><a href="../../index/index.html">Home</a></li>
            <li><a href="../../index/index.html#about">About</a></li>
            <li><a href="../book.php">Book a Pass</a></li>
            <li><a href="../../index/index.html#contact">Contact</a></li>
        </ul>
    </nav>
    <h1 class="header2">View Pass</h1>
    <form method="post" class="search-box">
        Search Your pass By Pass Number:<br><input type="text"  name="id"placeholder="Enter Your Phone Number" class="search-input">
        <input type="Submit" name="submit" value="Search"><br><br>
        <a href="phonesearch.php">Lost your Pass?</a>
    </form>
    <?php
    $conn = mysqli_connect("localhost","root","","busspass");

    if(isset($_POST['submit'])){
        $id = $_POST['id'];

        $query = "Select * from booking where passno ='$id'";
        $query_run = mysqli_query($conn,$query);

        while( $row = mysqli_fetch_array($query_run)){
            ?>
                <table border="2" width="100%">
                    <thead>
                        <tr>
                            <th>Pass Number</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Creation date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $row['passno']?></td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['phoneno']?></td>
                            <td><?php echo $row['passcreation']?></td>
                            <td><a href="viewpass.php?id=<?php echo $row['passno']?>" target="_blank">View</a></td>
                        </tr>
                    </tbody>
                </table>
        <?php
        }
    }

    ?>

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
    <script>
        var btn = document.getElementById('button');

        btn.addEventListener('click' , function(){
            window.open('http://localhost/Buspass/booking/View%20Pass/viewpass.php','popupWindow','width=500, height=300,resizable=yes,top=100,left=100,menubar=yes toolbar=yes,scrollbars=yes');
        });
    </script>
</body>
</html>