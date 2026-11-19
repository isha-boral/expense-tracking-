<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

include("config.php");

$sql = "SELECT * FROM users
        WHERE reset_token_hash = ?";

$stmt = $con->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$users = $result->fetch_assoc();

if ($users === null) {
    die("token not found");
}

if (strtotime($users["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="link href="css/style.css?v=<?php echo time(); ?> 
</head>
<body>

<div class="container-fluid">
        <div class="row px-5 py-5 align-items-center justify-content-center" style="min-height: 0vh;">
        <h1>Reset Password</h1>

    <form method="post" action="process-reset-password.php">
    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                            <div class="form-horizontal">
                                <div class="form-group px-5 ">
                                    <label for="floatingpassword">Password</label>
                                    <input type="password" name="password" class="form-control" id="floatingpassword"  placeholder="Password" required>
                                </div>
                                <div class="form-horizontal">
                                <div class="form-group px-5 ">
                                    <label for="floatingconfirmationpassword">Re-enter Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="floatingconfirmationpassword"  placeholder="Re-enter password" required>
                                </div>
                                <div class="form-group px-5 py-2">
                                    <button type="submit" name="Send" class="btn btn-primary Login-button text-light w-100 " name="login">Send</button>
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