<?php
include("config.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign Up </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" href="C:\xampp\htdocs\expense\img\wallet.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>
<body class=login-body>
    <div class="container-fluid signup-block">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 0vh;">
            <div class="signup-container col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="rounded p-4 p-sm-5 my-15 mx-3">
                    <h1 style="color:#071952; text-align: center;"><i class="fa-solid fa-wallet me-2"></i>Spend Easy
                        </h2><br>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4 style="color:#FFF";>Sign Up</h4>
                        </div>
                        <form name=form action="signupsetup.php"method="post">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label for="floatingusername">Username</label>
                                    <input type="text" name="username" class="form-control" id="floatingusername" placeholder="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="floatingemail">Email-Id</label>
                                    <input type="email" name="email" class="form-control" id="floatingemail" placeholder="Email-id" required>
                                </div>
                                <div class="form-group">
                                    <label for="floatingPassword">Password</label>
                                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="floatingPassword">Re-Enter Password</label>
                                    <input type="password" name="cpassword" class="form-control" id="floatingPassword" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn Login-button text-light py-3 w-100 mb-4" name="login">Sign In</button>
</div>
<div class="confirmation-link">
                                <p>Already have account? <a href="index.php">Log-In</a></p>
                            </div>
                            </div>
                        </form>
                       
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://kit.fontawesome.com/3a952ccb6d.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js\main.js" charset="utf-8"></script>
    

</body>
</html>
