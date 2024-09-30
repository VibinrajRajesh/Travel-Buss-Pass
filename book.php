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
    <link rel="stylesheet" href="./css/book.css">
    <link rel="stylesheet" href="./css/login.css">
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
            <div class="container ps-5 pt-1">
                <h2 class="header"><b>BOOK PASS</b></h2>
                <hr>
                <h5 class="pt-5">Enter your Details to Update Profile</h5><br>
                
                <form method="post" action="./backend/pay.php">
                    <div class="row ps-5">
                        <div class="col-12">
                            <h6>Name:</h6>
                            <input type="text" class="input1" name="name" value="<?php echo $_SESSION["name"];?>" readonly>
                        </div>
                        <div class="col-6 pt-3">
                            <h6>Email id:</h6>
                            <input type="email" name="email" value="<?php echo $_SESSION["email"];?>" readonly>
                        </div>
                        <div class="col-6 pt-3">
                            <h6>Phone No:</h6>
                            <input type="text" name="phone" value="<?php echo $_SESSION["phone"];?>" readonly>
                        </div>
                        <div class="col-6 pt-3">
                            <h6>Gender:</h6>
                            <input type="text" name="gender" value="<?php echo $_SESSION["gender"];?>" readonly>
                        </div>
                        <div class="col-6 pt-3">
                            <h6>Date of Birth:</h6>
                            <input type="text" name="dob" value="<?php echo $_SESSION["dob"];?>" readonly>
                        </div>
                        <div class="col-6 pt-3">
                            <h6>Identity Type:</h6>
                            <select name="idtype">
                                <option value="Choose Identity Type">Choose Identity Type</option>
                                <option value="Adhaar Card">Adhaar Card</option>
                                <option value="Voter Id">Voter Id</option>
                                <option value="Pan card">Pan Card</option>
                                <option value="Driving License">Driving License</option>
                                <option value="Passport">Passport</option>
                                <option value="Student Card">Student Card</option>
                                <option value="Official">Any Official Card</option>
                            </select>
                        </div>
                        <div class="col-6 pt-3">
                            <h6>Identity Number:</h6>
                            <input type="text" placeholder="Enter Identity Number" name="idno">
                        </div>
                        <div class="col-6 pt-3">
                            <h6>From Destination:</h6>
                            <?php
                                echo "<select name='from'>";
                                echo "<option value='Choose From Destination'>Choose From Destination</option>";
                                $sql = "SELECT destination FROM destination";
                                $result = mysqli_query($conn,$sql);
                                if (mysqli_num_rows($result)>0) {
                                    while ($row = $result->fetch_assoc()) {
                                        
                                        echo "<option value='" . $row['destination'] . "'>" . $row['destination'] . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>No products available</option>";
                                }
                                echo "</select>";
                            ?>
                        </div>
                        <div class="col-6 pt-3">
                            <h6>To Destination:</h6>
                            <?php
                                echo "<select name='to'>";
                                echo "<option value='Choose to Destination'>Choose to Destination</option>";
                                $sql = "SELECT destination FROM destination";
                                $result = mysqli_query($conn,$sql);
                                if (mysqli_num_rows($result)>0) {
                                    while ($row = $result->fetch_assoc()) {
                                        
                                        echo "<option value='" . $row['destination'] . "'>" . $row['destination'] . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>No products available</option>";
                                }
                                echo "</select>";
                            ?>
                        </div>
                        <div class="col-6 pt-3">
                            <h6>Validity:</h6>
                            <input type="radio" id="1month" name="choice" value="1 Month" onclick='document.getElementById("demo").value = "310"'/>
                            <label for="1month">1 Month</label>&emsp;
                            <input type="radio" id="3month" name="choice" value="3 Month" onclick='document.getElementById("demo").value = "610"'>
                            <label for="1month">3 Month</label>
                        </div>
                        <div class="col-6 pt-3">
                            <h6>Price:</h6>
                            <input type="text" name="price" id="demo" >
                        </div>
                        <div class="col-12 pt-5 pb-5">
                            <button id="rzp-button1" class="btn">Proceed to Payment</button>
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

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="verify.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
</form>
<script>
    // Checkout details as a json
var options = <?php echo $json?>;

/**
 * The entire list of Checkout fields is available at
 * https://docs.razorpay.com/docs/checkout-form#checkout-fields
 */
options.handler = function (response){
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.razorpayform.submit();
};

// Boolean whether to show image inside a white frame. (default: true)
options.theme.image_padding = false;

options.modal = {
    ondismiss: function() {
        console.log("This code runs when the popup is closed");
    },
    // Boolean indicating whether pressing escape key 
    // should close the checkout form. (default: true)
    escape: true,
    // Boolean indicating whether clicking translucent blank
    // space outside checkout form should close the form. (default: false)
    backdropclose: false
};

var rzp = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){
    rzp.open();
    e.preventDefault();
}
</script>