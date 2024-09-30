<nav class="navbar navbar-expand-lg shadow rounded fixed-top bg-white">
    <div class="container-fluid">
        <a class="navbar-brand logo fs-3 ps-5" href="#">Travel Buss Pass</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item pe-5 mx-auto fs-6">
                    <a class="nav-link text-uppercase" href="index.php">Home</a>
                </li>
                <li class="nav-item pe-5 mx-auto fs-6">
                    <a class="nav-link text-uppercase" href="about.php">About</a>
                </li>
                <li class="nav-item pe-5 mx-auto fs-6">
                    <a class="nav-link text-uppercase" href="#contact">Contact</a>
                </li>

                <?php
                session_start();
                if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
                    echo "
                    <li class='nav-item'>
                        <button id='myBtn'><i class='fa-regular fa-user' style='color: #271616;'></i></button>
                    </li>";
                } else {
                    echo "
                    <li class='nav-item'>
                        <button id='myModalBtn'><i class='fa-regular fa-user' style='color: #271616;'></i></button>
                    </li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Logged-in Modal -->
<div id="myModal2" class="modal2" style="display:none;">
    <div class="modal-content2">
        <span class="close"></span>
        <p>Welcome <?php echo $_SESSION['name']; ?></p>
        <a href="upprofile.php" class="alink">Update Profile</a><br />
        <a href="book.php" class="alink">Book Pass</a><br />
        <a href="viewpass.php" class="alink">View Pass</a><br />
        <a href="./backend/logout.php" class="alink">Logout</a><br />
    </div>
</div>
<?php
    include("./backend/register.php")
?>
<!-- Not Logged-in Modal -->
<div id="myModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close1"></span>
        <div class="row">
            <div class="col-md-6">
                <img src="./img/Banner 2.png" width="80%" class="banner2">
            </div>
            <div class="col-md-6">
                <h4 class="header2"><b>Login/Sign Up</b></h4>
                <hr class="aline" />
                <div class="form-box">
                    <div class="button-box">
                        <div id="btn"></div>
                        <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                        <button type="button" class="toggle-btn" onclick="register()">Register</button>
                    </div>

                    <!-- Login Form -->
                    <form id="login" class="input-group" method="post" action="./backend/register.php">
                        <input type="email" name="email" class="input-field" placeholder="Email" required /><br><br>
                        <input type="password" name="passn" class="input-field" placeholder="Password" required /><br><br>
                        <div class="forgot">
                            <a href="#">Forgot Password?</a>
                        </div><br>
                        <button type="submit" class="submit-btn" name="login">Login</button>
                    </form>

                    <!-- Register Form -->
                    <form id="register" class="input-group" method="post" action="./backend/register.php">
                        <input type="text" name="name" class="input-field" placeholder="Name" required /><br><br>
                        <input type="email" name="email" class="input-field" placeholder="Email" required /><br><br>
                        <input type="password" name="pass" class="input-field" placeholder="Password" required /><br><br>
                        <input type="checkbox" />&emsp;I Agree Terms & Conditions<br><br>
                        <button type="submit" class="submit-btn" name="signup">Register</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
