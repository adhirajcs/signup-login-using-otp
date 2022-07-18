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
    <link href="custom/index.css" rel="stylesheet">
    <title>Login</title>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <br>
                <div class="status">
                    <h3>Status: <span class="badge bg-danger">Inactive</span></h3>
                </div>
                <hr>
                <div class="f1">
                    <form action="otp.php" method="POST">
                        <label>Enter your Name: </label>
                        <input type="text" name="name" placeholder="Your Full Name" required><br><br>
                        <label>Enter your Email ID: </label>
                        <input type="email" name="email" placeholder="username@abc.com" required><br><br>
                        <label>Enter your Phone number: </label>
                        <input type="tel" id="phone" name="phone" placeholder="0123456789" pattern="[0-9]{10}" required><br><br>
                        <label>type your Gender: &nbsp;</label>
                        <label><input type="radio" name="gender" value="male" required> Male&nbsp;&nbsp;</label>
                        <label><input type="radio" name="gender" value="female" required> Female</label><br><br>
                        <label>Enter your Password: </label>
                        <input type="password" name="password" required><br><br>

                        <button type="submit" name="save" class="btn btn-success">Login</button>

                        <button type="reset" name="reset" class="btn btn-danger">Cancel</button>

                    </form>
                </div>

            </div>
        </div>
    </div>


</body>

</html>