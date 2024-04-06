<?php
$conn = mysqli_connect("localhost","root","","busspass");

$id= $_GET['id'];
$query = "Select * from booking where passno ='$id'";
$query_run = mysqli_query($conn,$query);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bus Pass</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link rel="icon" type="image/png" href="../favicon.png">
</head>
<body>
<?php
while( $row = mysqli_fetch_array($query_run)){
?>
    <table border="2" >
        <tr>
            <td colspan="3" width="25%" class="header3"><img src="favicon.png" width="6%">Travel Bus Pass</td>
        </tr>
        <tr>
            <td>Pass no</td>
            <td><?php echo $row['passno']?></td>
            <td rowspan="8" width="25%">Stick Your Image</td>
        </tr>
        <tr>
            <td>Name</td>
            <td><?php echo $row['name']?></td>
        </tr>
        <tr>
            <td>Phone no</td>
            <td><?php echo $row['phoneno']?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $row['email']?></td>
        </tr>
        <tr>
            <td>Source</td>
            <td><?php echo $row['source']?></td>
        </tr>
        <tr>
            <td>Destination</td>
            <td><?php echo $row['destination']?></td>
        </tr>
        <tr>
            <td>Duration</td>
            <td><?php echo $row['period']?></td>
        </tr>
        <tr>
            <td>Pass Creation Date</td>
            <td><?php echo $row['passcreation']?></td>
        </tr>
    </table>
<?php
}
?>
<br>
<button class="print" onclick="window.print()">Print Pass</button>
</body>
</html>
