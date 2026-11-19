<?php
include('header.php');
checkUser();
adminArea();
$msg="";
$category="";
$label="Add"; 
if(isset($_GET['id'])  && $_GET['id']>0){
    $label="Edit";
    $id=get_safe_value($_GET['id']);
    $res=mysqli_query($con,"select * from category where id=$id");
    if(mysqli_num_rows($res)==0){
        redirect('category.php');
        die();
    }
    $row=mysqli_fetch_assoc($res);
    $category=$row['name'];
    }
    if(isset($_POST['submit'])){
    $name=get_safe_value($_POST['name']);
    $type="add";
    $sub_sql="";
    if(isset($_GET['id']) && $_GET['id']>0){
        $type="edit";
        $sub_sql="and id!=$id";
    }

    $res=mysqli_query($con,"select * from category where name='$name' $sub_sql");
    if(mysqli_num_rows($res)>0){
         $msg="Category aldready exists";
    }else{   
         $sql="insert into category(name) values('$name')";
         if(isset($_GET['id']) && $_GET['id']>0){
             $sql="update category set name='$name' where id=$id";
     
         }
         mysqli_query($con,$sql);
         redirect('category.php');
     }
  
}
?>
<div class="content col-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="table-responsive">
            <div class=<br><a href="manage_category.php">Add Category</a></br>
                <form method="post">
                    <div class="form-group">
                        <label  class="control-label mb-1">Category</label>
                        <input type="text" name="name" required value="<?php echo $category?>"class="form-control" required>
                    </div>
                    <div class="form-group d-grid gap-2">
                        <br><input type="submit" name="submit" value="submit"  class="btn text-white"></br>
                    </div>
                    <div class="message">
                        <?php echo $msg?>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</form>
<?php
include('footer.php');
?>