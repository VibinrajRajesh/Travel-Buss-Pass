
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Buss Pass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/viewpass.css">
    <script src="https://kit.fontawesome.com/c7348bdcd6.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
</head>
<body>
<?php
    include("partials/nav.php");
    include("./backend/serverconfig.php");
?>
    <!--Section Content Starts-->
    <section id="viewpass">
            <div class="container">
            <h2 class="header"><b>View Pass</b></h2>
            <hr>
            <h5 class="pt-5">View your Pass here</h5><br>
            <table>
                <tr>
                    <th>Sr No</th>
                    <th>PassNo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Id Type</th>
                    <th>Id Number</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Validity</th>
                    <th>Action</th>
                </tr>
                <?php
                    $userid = $_SESSION['id'];
                    $sql = "SELECT * FROM users INNER JOIN booking ON users.user_id=booking.user_id WHERE users.user_id='$userid'";
                    $query = mysqli_query($conn,$sql);
                    $serialNumber = 1;
                    while($rows=mysqli_fetch_assoc($query)){
                        ?>
                        <tr>
                            <td><?php echo $serialNumber; ?></td>
                            <td><?php echo $rows['passno']?></td>
                            <td><?php echo $rows['name']?></td>
                            <td><?php echo $rows['email']?></td>
                            <td><?php echo $rows['phoneno']?></td>
                            <td><?php echo $rows['gender']?></td>
                            <td><?php echo $rows['dob']?></td>
                            <td><?php echo $rows['idtype']?></td>
                            <td><?php echo $rows['idno']?></td>
                            <td><?php echo $rows['source']?></td>
                            <td><?php echo $rows['destination']?></td>
                            <td><?php echo $rows['validity']?></td>
                            <td><a href="#">Download</a></td>
                        </tr>
                        <?php
                        $serialNumber++;
                    }
                ?>
            </table>
            </div>
        </section>
    <!--Section Content Ends-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>
</html>
