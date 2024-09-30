<?php

require('serverconfig.php');

session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $orderid = $_SESSION['razorpay_order_id'];
    $passno = mt_rand(100000000, 999999999);
    $userid = $_SESSION['id'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $idtype = $_SESSION['idtype'];
    $idno = $_SESSION['idno'];
    $source = $_SESSION['from'];
    $destination = $_SESSION['to'];
    $validity = $_SESSION['validity'];
    $payment_status = "Success";

    $sql = "SELECT * FROM booking WHERE user_id='$userid'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    $_SESSION['passno'] = $passno;
    $_SESSION['source'] = $source;
    $_SESSION['destination'] = $destination;
    $_SESSION['validity'] = $validity;
    $_SESSION['POC'] = $row['passcreation'];


    $sql = "insert into booking(order_id,passno,user_id,idtype,idno,source,destination,validity)values('$orderid','$passno','$userid','$idtype','$idno','$source','$destination','$validity')";
    $query = mysqli_query($conn,$sql);
    if($query){
        include("sendemail.php");
        header("location: ../sucesspage.php");
    }


}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;