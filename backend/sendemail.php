<?php
require_once __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$passno = $_SESSION['passno'];
$userID = $_SESSION['id'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
$Gender = $_SESSION['gender'];
$DOB = $_SESSION['dob'];
$source = $_SESSION['source'];
$destination = $_SESSION['destination'];
$validity = $_SESSION['validity'];
$POC = $_SESSION['POC'];
$Amount = $_SESSION['price'];

// Create an instance of the mPDF class
$mpdf = new \Mpdf\Mpdf();

// Define CSS styles for the table
$stylesheet = '
    <style>
        body{
            background: linear-gradient(to bottom, #5200ff 0%, #6699ff 100%);
        }
        .container{
            background:#fff;
            height:30vh;
        }
        .header{
            padding-top:20px;
            padding-left:20%;
        }

        .line{
            width:80%;
        }

        .content{
            padding-left:10%;
        }
        table {
            width: 90%;/* Set table height */
            border-collapse: separate;
            border-spacing: 0 10px; /* Space between rows */
            border: 1px solid black; /* Optional: Adds border to the table */
            margin-bottom:10%;
        }
        td{
            padding: 10px;
        }
    </style>
';

// Add the stylesheet to the mPDF object
$mpdf->WriteHTML($stylesheet);

// Create the HTML content for the table
$html = '
    <div class="container">
        <div class="header">
            <img src="logo.png" width="70%" />
        </div>
        <hr class="line" />
        <div class="content">
            <h1 style="color:#5200ff;">Personal Information</h1>
            <table>
                <tr>
                    <td>
                        <h3>Pass no:</h3>
                        <p>'. $passno .'</p>
                    </td>
                    <td rowspan="2" style="text-align:center;">
                        <img src="#" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>User ID:</h3>
                        <p>'. $userID .'</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Name:</h3>
                        <p>'. $name .'</p>
                    </td>
                    <td>
                        <h3>Email:</h3>
                        <p>'. $email .'</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Phone:</h3>
                        <p>'. $phone .'</p>
                    </td>
                    <td>
                        <h3>Gender:</h3>
                        <p>'. $Gender .'</p>
                    </td>
                </tr>
            </table>

            <h1 style="color:#5200ff;">Pass Information</h1>

            <table>
                <tr>
                    <td>
                        <h3>Source:</h3>
                        <p>'. $source .'</p>
                    </td>
                    <td>
                        <h3>Destination:</h3>
                        <p>'. $destination .'</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Validity:</h3>
                        <p>'. $validity .'</p>
                    </td>
                    <td>
                        <h3>Amount:</h3>
                        <p>'. $Amount .'</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Pass Creation:</h3>
                        <p>'. $POC .'</p>
                    </td>
                </tr>
            </table>
        </div>
        <p style="text-align:center;">1 Passenger Only, Non Transferable.Please Show valid proof of ID if asked for.</p>
        <p style="text-align:center;">For any type of query go to Website.</p>
    </div>
';

// Write the HTML to the PDF
$mpdf->WriteHTML($html);

// Output the PDF to the browser
$pdf = $mpdf->Output('','S');

$enquirydata = [
    'Passno' => $passno,
    'Name' => $name,
    'Email' => $email
];

sendEmail($pdf,$enquirydata);

function sendEmail($pdf,$enquirydata){
    $mail = new PHPMailer(true);

    try {
        //Server settings

        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'vibinrajesh2021@gmail.com';                     //SMTP username
        $mail->Password   = 'ijjtzlhullmrnsys';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('vibinrajesh2021@gmail.com', 'Travel Buss Pass');
        $mail->addAddress($enquirydata['Email'], $enquirydata['Name']);     //Add a recipient

        //Attachments
        $mail->addStringAttachment($pdf,'myattachment.pdf');         //Add attachments   //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Buss Pass Receipt and Pass';
        $mail->Body    = '
        <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    body {
        font-family: Arial, sans-serif;
        color: #333;
        line-height: 1.5;
    }
    .container {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
    }
    h1 {
        color: #1a73e8;
        text-align: center;
    }
    p {
        font-size: 16px;
        margin-bottom: 10px;
    }
    .highlight {
        font-weight: bold;
        color: #1a73e8;
    }
    .pass-number {
        font-size: 20px;
        font-weight: bold;
        color: #d9534f;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Travel Pass Receipt</h1>
    <p>Dear <span class="highlight">'.$enquirydata['Name'].'</span>,</p>
    <p>Your transaction was successful!</p>
    <p><b>Pass Number:</b> <span class="pass-number">'.$enquirydata['Passno'].'</span></p>
    <p>Thank you for choosing our service! Attached is your pass receipt.</p>
</div>
</body>
</html>
        ';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
        }
?>
