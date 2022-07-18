<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="custom/otp.css" rel="stylesheet">
    <title>Login</title>

</head>

<body>

    <!-- PHP code -->
    <?php
    if (isset($_POST['save'])) {
        $n = $_POST['name'];
        $e = $_POST['email'];
        $ph = $_POST['phone'];
        $g = $_POST['gender'];
        $pa = $_POST['password'];


        $con = mysqli_connect("localhost", "root", "", "adhi_db");

        $x = "INSERT INTO otp_verify SET name='$n', email='$e', phone='$ph', gender='$g', password='$pa'";

        $con->query($x);
    } else {
        echo "Access Denied";
    }
    ?>
    <br>
    <div class="otp">
        <form method="POST">
            <div class="first_box">
                <label><i>Enter your Phone Number:&nbsp;</i></label>
                <input type="number" id="phone" name="phone" placeholder="Your Phone Number" required><br><br>
                <span id="phone_error" class="error"></span><br>
                <button type="button" onclick="send_otp()" class="btn btn-primary">Send OTP</button>
            </div><br>

            <div class="second_box">
                <label><i>Enter your OTP:&nbsp;</i></label>
                <input type="number" id="otp" name="otp" placeholder="Your OTP" required><br><br>
                <span id="otp_error" class="error"></span><br>
                <button type="button" class="py-1 btn btn-primary" onclick="submit_otp()">Submit OTP</button>
            </div>
        </form>
    </div>

    <script>
        function send_otp() {
            var phone = jQuery('#phone').val();
            jQuery.ajax({
                url: 'send_otp.php',
                type: 'post',
                data: 'phone=' + phone,
                success: function(result) {
                    if (result == 'yes') {
                        jQuery('.first_box').hide();
                        jQuery('.second_box').show();
                    }
                    if (result == 'not_exist') {
                        jQuery('#phone_error').html('enter valid mobile no.');
                    }

                }
            })
        }

        function submit_otp() {
            var otp = jQuery('#otp').val();
            jQuery.ajax({
                url: 'verify_otp.php',
                type: 'post',
                data: 'otp=' + otp,
                success: function(result) {
                    if (result == 'yes') {
                        window.location = 'success.php'
                    }
                    if (result == 'no') {
                        jQuery('#otp_error').html('enter valid otp');
                    }

                }
            })
        }
    </script>
</body>

</html>