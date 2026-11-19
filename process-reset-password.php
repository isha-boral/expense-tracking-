<?php

$token = $_POST["token"];

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

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "UPDATE users
        SET password = ?,
            reset_token_hash = NULL,
            reset_token_expires_at = NULL
        WHERE id = ?";

$stmt = $con->prepare($sql);

$stmt->bind_param("ss", $password, $users["id"]);

$stmt->execute();

echo'<script>
            alert("Password Changed")
            window.location.href="index.php"
            </script>';