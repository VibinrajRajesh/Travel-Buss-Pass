<?php
    include("serverconfig.php");

    if(isset($_POST["signup"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
    
        // Hash the password for security
        $password_hash = password_hash($pass, PASSWORD_DEFAULT);
    
        // Check if the email already exists in the database
        $check_email_query = "SELECT * FROM users WHERE email = '$email'";
        $check_email_result = mysqli_query($conn, $check_email_query);
    
        if(mysqli_num_rows($check_email_result) > 0) {
            // If email already exists, show an alert
            echo "<script>
                alert('Error: User with this email already exists.');
                window.location.href='http://localhost/TBP2/';
              </script>";
        } else {
            // Insert new user into the database
            $sql = "INSERT INTO users (name, email, password,login_by) VALUES ('$name', '$email', '$password_hash','Entry Login')";
            $result = mysqli_query($conn, $sql);
    
            if($result) {
                // Query successful, fetch user data with a new SELECT query
                $get_user_query = "SELECT * FROM users WHERE email = '$email'";
                $get_user_result = mysqli_query($conn, $get_user_query);
                $row = mysqli_fetch_assoc($get_user_result);
    
                // Start session and store user data
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $row['user_id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['phone'] = $row['phoneno'];
                $_SESSION['gender'] = $row['gender']; 
                $_SESSION['dob'] = $row['dob']; 
    
                // Redirect to homepage or any page
                header("location: http://localhost/TBP2/");
                exit();  // Exit to ensure no further code is executed after redirect
            } else {
                // If insertion fails, show an error
                $error_message = mysqli_error($conn);
                echo "<script>alert('Error: " . $error_message . "');
                window.location.href='http://localhost/TBP2/';</script>";
            }
        }
    }
    

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['passn'];

        $sql = "select * from users where email = '$email'";
        $result = mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['password'];

            if(password_verify($password, $hashed_password)){
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $row['user_id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['phone'] = $row['phoneno'];
                $_SESSION['dob'] = $row['dob'];

                header("location:http://localhost/TBP2/");
            }else {
                echo "<script>alert('Invalid email or password');
                window.location.href='http://localhost/TBP2/';</script>
                ";
            }
        }else {
            echo "<script>alert('No user found with this email');
            window.location.href='http://localhost/TBP2/';</script>";
        }
    }
?>