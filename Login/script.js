function register() {
    var username = document.regi.name.value;
    var email = document.regi.email.value;
    var password = document.regi.password.value;
    var newpassword = document.regi.repass.value;

    if (username == null || username == "") {
        alert("User ID can't be blank");
    }
    else if (email == null || email == "") {
        alert("Email can't be blank");
    }

    else if (password != newpassword) {
        alert("Passwords are not same please retype");
    }

    else {
        alert('Form Succesfully Submitted');
    }

}

