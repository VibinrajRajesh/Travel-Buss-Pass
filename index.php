
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Buss Pass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/c7348bdcd6.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
</head>
<body>
<?php
    include("partials/nav.php");
?>
    <!--Section Content Starts-->
    <section id="home">
        <div class="container">
            <div class="container-fluid">
                <div class="row lead2">
                    <div class="col-lg-6 Banner-head">
                        <h1>Lets Go Non-Stop<br> without any queue</h1>
                        <h3>Get Your Pass Today</h3>
                        <button type="button" class="btn" onclick="">Book Now</button>
                    </div>
                    <div class="col-lg-6">
                        <img src="img/Banner.png" width="80%" class="banner">
                    </div>
                </div>
            </div>  
        </div>
    </section>

    <section id="book">
        <div class="container">
            <div class="container-fluid">
                <h4 class="header">How to Book a Pass</h4>
                <hr class="aline" /><br><br>
                <div class="container-fluid">
                    <p class="lead">1.Firstly you have to Login to your account(If you dont have account, register from sign up button there).<br>
                        2.After that go on book a pass and you will redirected page where you will be asked that wheather create new pass or renew pass.<br>
                        3.Fill your details and do payment then you will have your pass.<br>
                        4.You can view your pass and take print or you can keep your pass pdf file in your phone.whenever you will travel show it to officers.<br>
                        5.You can renew your pass 1 month before it expires.
                    </p>
                    <div class="tags">
                        <div class="row">
                            <div class="col-lg-4">
                                <i class="fa-solid fa-lock fa-9x"></i><br><br>
                                <p>Secure Payment</p>
                            </div>
                            <div class="col-lg-4">
                                <img src="img/safety.png" width="35%"/><br><br>
                                <p>100% Safety and Sanitized</p>
                            </div>
                            <div class="col-lg-4">
                                <img src="img/customer.png" width="35%"/><br><br>
                                <p>24/7 Customer Service</p>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
        
    </section>

    <!--Footer Section-->
    <?php
        include("./partials/footer.php")
    ?>
    <!--Footer Section Ends-->

    <!--Section Content Ends-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>
</html>
