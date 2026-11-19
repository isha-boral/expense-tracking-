<?php
include('config.php');
include('functions.php');
$msg="";
if(isset($_POST['login'])){
	 $username=get_safe_value($_POST['username']);
	 $password=get_safe_value($_POST['password']);

	
	$res=mysqli_query($con,"select * from users where username='$username'");
	
	if(mysqli_num_rows($res)>0){
		$row=mysqli_fetch_assoc($res);
		$verify=password_verify($password,$row['password']);
     if($verify==1) {
    
		$_SESSION['UID']=$row['id'];
		$_SESSION['UNAME']=$row['username'];
		$_SESSION['UROLE']=$row['role'];
        if(isset($_POST['remember-me'])){
            setcookie('username',$_POST['username'],time()+(60*60*24));
            setcookie('password',$hash,time()+(60*60*24));
        }
        else{
            setcookie('username','',time()-(60*60*24));
            setcookie('password','',time()-(60*60*24));
        }
		if($_SESSION['UROLE']=='User'){
				redirect('dashboard.php');
		}else{
				redirect('category.php');
		}
	}else {
        echo'<script>
        window.location.href="index.php"
        alert("please enter valid password")
        </script>';
	
	}

	}else{
        echo'<script>
        window.location.href="index.php"
        alert("please enter valid username")
        </script>';
		
	}
}
if(isset($_COOKIE['username'])&&isset($_COOKIE['password'])){
    $id=$_COOKIE['username'];
    $pass=$_COOKIE['password'];
}
else{
    $id="";
    $pass="";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Log In </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


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
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 0vh;">
            <div class=" login-container col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="rounded p-4 p-sm-5 my-15 mx-3">
                    <h1 style="color:#071952; text-align: center;"><i class="fa-solid fa-wallet me-2"></i>Spend Easy
                        </h2><br>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4 style="color:#FFF";>Log In</h4>
                        </div>
                        <form method="post">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label for="floatingusername">Username</label>
                                    <input type="text" name="username" class="form-control" id="floatingusername" value="<?php echo $id?>" placeholder="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="floatingPassword">Password</label>
                                    <input type="password" name="password" class="form-control" id="floatingPassword" value="<?php echo $pass?>" placeholder="Password" required>
                                </div>
                                <div class="remember-forgot">
                                <label class="remember-Me"><input class="checkbox" type="checkbox" name="remember-me"/>Remember Me</label>
                                <a class="forgot-link"href="forgot-password.php">Forgot Password</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="login" class="btn Login-button text-light py-3 w-100 mb-4" name="login">Log In</button>
                                </div>
                                <div>

                                <div class="confirmation-link">
                                <p>Don't have an account? <a href="signup.php">Register</a></p>
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