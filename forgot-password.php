<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <meta charset="UTF-8">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="link href="css/style.css?v=<?php echo time(); ?> 
</head>
<body>
<div class="container-fluid">
        <div class="row px-5 py-5 align-items-center justify-content-center" style="min-height: 0vh;">
    <h1>Forgot Password</h1>

    <form method="post" action="send-password-reset.php">
                            <div class="form-horizontal">
                                <div class="form-group px-5 ">
                                    <label for="floatingemail">Email-Id</label>
                                    <input type="email" name="email" class="form-control" id="floatingemail"  placeholder="Email-id" required>
                                </div>
                                <div class="form-group px-5 py-2">
                                    <button type="submit" name="login" class="btn btn-primary Login-button text-light w-100 " name="login">Log In</button>
                                </div>
</div>
                            
        

    </form>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://kit.fontawesome.com/3a952ccb6d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="js\main.js?v=<?php echo time(); ?>" charset="utf-8"></script>
</body>
</html>