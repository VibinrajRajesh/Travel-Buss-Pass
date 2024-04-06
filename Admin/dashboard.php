<?php
$conn=mysqli_connect("localhost","root","","busspass");
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Travel Bus Pass Admin </title>
    <link rel="stylesheet" href="style2.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="sidebar">
    <div class="logo-details">
        &nbsp <span class="logo_name">Bus Pass</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="dashboard.php" class="active">
                <i class='bx bx-grid-alt' ></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="manageadmin.php">
                <i class='bx bx-box' ></i>
                <span class="links_name">Manage Admin</span>
            </a>
        </li>
        <li>
            <a href="managepass.php">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name">Manage Pass</span>
            </a>
        </li>
        <li class="log_out">
            <a href="#">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Log out</span>
            </a>
        </li>
    </ul>
</div>
<section class="home-section">
    <nav>
        <div class="sidebar-button">
            <i class='bx bx-menu sidebarBtn'></i>
            <span class="dashboard">Dashboard</span>
        </div>
    </nav>
<?php
$sql ="SELECT ID from admin ";
$query_run = mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($query_run);
?>
    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Admin User</div>
                    <div class="number"><?php echo $rowcount;?></div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                        <span class="text">Up from yesterday</span>
                    </div>
                </div>
            </div>
            <?php
            $sql ="SELECT id from booking ";
            $query_run = mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($query_run);
            ?>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Pass Purchased</div>
                    <div class="number"><?php echo $rowcount;?></div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                        <span class="text">Up from yesterday</span>
                    </div>
                </div>
            </div>
            <?php
            $sql ="SELECT id from users ";
            $query_run = mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($query_run);
            ?>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Users</div>
                    <div class="number"><?php echo $rowcount;?></div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                        <span class="text">Up from yesterday</span>
                    </div>
                </div>
            </div>
            <?php
            $sql ="SELECT id from refund ";
            $query_run = mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($query_run);
            ?>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Refund</div>
                    <div class="number"><?php echo $rowcount;?></div>
                    <div class="indicator">
                        <i class='bx bx-down-arrow-alt down'></i>
                        <span class="text">Down From Today</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if(sidebar.classList.contains("active")){
            sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
        }else
            sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
</script>

</body>
</html>

