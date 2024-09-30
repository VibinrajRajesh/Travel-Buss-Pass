<?php
include("error.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Buss Pass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="stylesheet" href="./css/login.css">
    <script src="https://kit.fontawesome.com/c7348bdcd6.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="image/favicon.png" type="image/x-icon">
</head>
<body>
    <?php
      include("./partials/nav.php");
    ?>
    <!--Section Content Starts-->
        <section id="profile">
            <div class="container ps-5 pt-1">
                <h1 class="header"><b>Update Profile</b></h1>
                <hr>
                <h5 class="pt-5">Enter your Details to Update Profile</h5><br>
                <form method="post">
                    <div class="row ps-5">
                        <div class="col-12">
                            <h6>Name:</h6>
                            <input type="text" class="input1" name="name" value="<?php echo $_SESSION["name"];?>" >
                        </div>
                        <div class="col-6 pt-3">
                            <h6>Email id:</h6>
                            <input type="email" name="email" value="<?php echo $_SESSION["email"];?>" >
                        </div>
                        <div class="col-6 pt-3">
                            <h6>Phone No:</h6>
                            <input type="text" name="phone" value="<?php echo $_SESSION["phone"];?>" >
                        </div>
                        <div class="col-6 pt-3">
                            <h6>Gender:</h6>
                            <input type="text" name="gender" value="<?php echo $_SESSION["gender"];?>" >
                        </div>
                        <div class="col-6 pt-3">
                            <h6>Date of Birth:</h6>
                            <input type="text" name="dob" value="<?php echo $_SESSION["dob"];?>" >
                        </div>
                        <div class="col-12 pt-5 pb-5">
                            <input type="submit" name="update" value="Update Profile" >
                        </div>
                    </div>
                </form>
            </div>

        </section>
    <!--Section Content Ends-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>
</html>

<?php
include("./backend/serverconfig.php");
if (isset($_POST['update'])) {
    session_start();  // Ensure the session is started

    $id = $_SESSION['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    // Update the user details in the database
    $sql = "UPDATE `users` SET `name` = '$name', `email` = '$email', `phoneno` = '$phone', `gender` = '$gender', `dob` = '$dob' WHERE `user_id` = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Fetch the updated data from the database to update the session
        $fetch_sql = "SELECT `user_id`, `name`, `email`, `phoneno`, `gender`, `dob` FROM `users` WHERE `user_id` = '$id'";
        $fetch_result = mysqli_query($conn, $fetch_sql);

        if ($fetch_result) {
            $row = mysqli_fetch_assoc($fetch_result);

            // Update session variables
            $_SESSION['id'] = $row['user_id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone'] = $row['phoneno'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['dob'] = $row['dob'];

            // Redirect after successful update
            echo "<script>
                alert('Update Successful');
                window.location.href='http://localhost/TBP2/upprofile.php';
            </script>";
        } else {
            echo "Error fetching updated data: " . mysqli_error($conn);
        }
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

?>