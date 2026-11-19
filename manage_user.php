<?php
include('header.php');
checkUser();
adminArea();
$msg="";
$username="";
$password="";
$email="";
$label="Add"; 
if(isset($_GET['id'])  && $_GET['id']>0){
    $label="Edit";
    $id=get_safe_value($_GET['id']);
    $res=mysqli_query($con,"select * from users where id=$id");
    if(mysqli_num_rows($res)==0){
        redirect('users.php');
        die();
    }
    $row=mysqli_fetch_assoc($res);
    $username=$row['username'];
    $password=$row['password'];
    $email=$row['email'];

    }
    if(isset($_POST['submit'])){
    $username=get_safe_value($_POST['username']);
    $password=get_safe_value($_POST['password']);
    $email=get_safe_value($_POST['email']);

    $type="add";
    $sub_sql="";
    if(isset($_GET['id']) && $_GET['id']>0){
        $type="edit";
        $sub_sql="and id!=$id";
    }

    $res=mysqli_query($con,"select * from users where username='$username'and email='$email' $sub_sql");
    if(mysqli_num_rows($res)>0){
         $msg="User aldready exists";
    }else{
            $password=password_hash($password,PASSWORD_DEFAULT);
         
         $sql="insert into users(username,password,role,email) values('$username','$password','User','$email')";
         if(isset($_GET['id']) && $_GET['id']>0){
             $sql="update users set username='$username',email='$email',password='$password' where id=$id";
     
         }
         mysqli_query($con,$sql);
         redirect('users.php');
     }
  }
?>
<div class="col-12">
    <div class="content bg-light rounded h-100 p-4">
        <div class="table-responsive">
            <div class=<br><a href="manage_user.php">Add User</a></br>
                <form method="post">
                    <div class="form-group">
                        <tr><label  class="control-label mb-1">Username</label>
                        <th><input type="username" name="username" required value="<?php echo $username?>"class="form-control" required>
                        </th>
                        </tr>
                        <tr>
                            <label  class="control-label mb-1">Password</label>
                            <th><input type="password" name="password" required value="<?php echo $password?>"class="form-control" required>
                            </th> 
                        </tr>
                        <tr>
                            <label  class="control-label mb-1">Email</label>
                            <th><input type="email" name="email" required value="<?php echo $email?>"class="form-control" required>
                            </th> 
                        </tr>
                        <tr>
                            <th></th>
                            <div class="form-group d-grid gap-2">
                                <th><br><input type="submit" name="submit" value="submit" class="btn text-white"></br>
                                </th>
                        </tr>
                        <div class="message">
                            <?php echo $msg?>
                        </div>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>

</div>

<?php
include('footer.php');
?>
