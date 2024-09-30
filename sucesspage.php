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
    <link rel="stylesheet" href="./css/sucess.css">
    <script src="https://kit.fontawesome.com/c7348bdcd6.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="image/favicon.png" type="image/x-icon">
</head>
<body>
    <?php
      include("./partials/nav.php");
      include("./backend/serverconfig.php");
    ?>
    <!--Section Content Starts-->
        <section id="book">
            <div class="container ps-5 pb-5">
            <img src="./img/checkmark.gif" width="20%" class="checkimg"/>
            <h3 style="color:#37b737; text-transform:uppercase; margin-left:30%;"><b>Congratulations</b></h3><br>
            <p style="text-align:center;">We are pleased to inform you that Pass have been Booked Successfully.</p>
            <p style="text-align:center;">Pass no:<br><?php echo $_SESSION['passno'];?></p>
            <p style="text-align:center;">Here is your Pass Number you can view your pass.</p>
            </div>
        </section>
    <!--Section Content Ends-->
    <?php
    include("partials/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>
</html>