<?php
    include("./serverconfig.php");

    include("../error.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Buss Pass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/order.css">
    <script src="https://kit.fontawesome.com/c7348bdcd6.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
      include("../partials/nav.php");
    ?>
    <!--Section Content Starts-->
        <section id="book">
            <div class="container">
            <h1 class="header"><b>Verify Details</b></h1>
            <hr><br>
            <h5 class="ps-5">Verify your Details:</h5><br>
            <table>
                <tr>
                    <th>Name:</th>
                    <td><?php echo $_SESSION['name'];?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?php echo $_SESSION['email'];?></td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td><?php echo $_SESSION['phone'];?></td>
                </tr>
                <tr>
                    <th>DOB:</th>
                    <td><?php echo $_SESSION['dob'];?></td>
                </tr>
                <tr>
                    <th>Gender:</th>
                    <td><?php echo $_SESSION['gender'];?></td>
                </tr>
                <tr>
                    <th>ID Type:</th>
                    <td><?php echo $_SESSION['idtype'];?></td>
                </tr>
                <tr>
                    <th>ID No:</th>
                    <td><?php echo $_SESSION['idno'];?></td>
                </tr>
                <tr>
                    <th>From:</th>
                    <td><?php echo $_SESSION['from'];?></td>
                </tr>
                <tr>
                    <th>To:</th>
                    <td><?php echo $_SESSION['to'];?></td>
                </tr>
                <tr>
                    <th>Validity:</th>
                    <td><?php echo $_SESSION['validity'];?></td>
                </tr>
                <tr>
                    <th>Price:</th>
                    <td><?php echo $_SESSION['price'];?></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;"><button id="rzp-button1" class="btn">Continue to Payment</button></td>
                </tr>
            </table>
            </div>
        </section>
    <!--Section Content Ends-->
    <?php
    include("partials/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="./js/modal.js"></script>
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