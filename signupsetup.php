<?php
include("config.php");
include('functions.php');
$username="";
$password="";
$cpassword="";
$email="";
$msg="";
if(isset($_POST["submit"]));{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $email=$_POST['email'];
  
    $query="select * from users where username='$username'";
    $res=mysqli_query($con,$query);
    $count_users=mysqli_num_rows($res);

    $query="select * from users where email='$email'";
    $res=mysqli_query($con,$query);
    $count_email=mysqli_num_rows($res);

    if($count_users==0 && $count_email==0){
       if($password==$cpassword){
          $hash=password_hash($password,PASSWORD_DEFAULT);
          $query="INSERT INTO users(username,password,role,email) VALUES('$username','$hash','User','$email')";
          $res=mysqli_query($con,$query);
          if($res>0){
            header("Location:index.php");
          }
          
       }
       else{
        echo'<script>
        window.location.href="signup.php"
        alert("Password Does Not Match")
        </script>';
        }

    }
    else{
        if($count_users>0){

             echo'<script>
             window.location.href="signup.php"
             alert("Username Already Exists")
             </script>';

            } 
        if($count_email>0){
            echo'<script>
            window.location.href="signup.php"
            alert("Email-Id Already Exists")
            </script>';
       }
        
    }
}
