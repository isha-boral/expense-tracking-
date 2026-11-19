<?php
include('header.php');
checkUser();
adminArea();
if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id']) && $_GET['id']>0){
    $id=get_safe_value($_GET['id']);
    mysqli_query($con,"delete from users where id=$id");

    mysqli_query($con,"delete from expense where added_by=$id");
    echo "</br>Data  deleted</br>";
}
$res=mysqli_query($con,"select * from users where ROLE='User' order by id desc ");
?>
<script>
    document.title="Users";
document.getElementById("users.php")
</script>

<?php
if(mysqli_num_rows($res)>0){
?>
<div class="col-12 content expense-container">
    <div class="rounded h-100 p-4">
        <div class="table-responsive">
            <h2>Users</h2>
            <a href="manage_user.php">Add User</a>
            </br></br>
            <table style="width: auto;" class="table">
                <thead class="table-heading">
                    <th class="col-1">Id</th>
                    <th class="col-1">Name</th>
                    <th class="col-1">Email</th>

                    <th class="col-1"></th>
                    </tr>
                </thead>

                </tr>
                <?php while($row=mysqli_fetch_assoc($res)){
?>
                <tr>
                    <td>
                        <?php echo $row['id'];?>
                    </td>
                    <td>
                        <?php echo $row['username']?>
                    </td>
                    <td>
                        <?php echo $row['email']?>
                    </td>
                    <td>

                        <a href="manage_user.php?id=<?php echo $row['id'];?>">Edit</a>&nbsp;

                        <a href="javascript:void(0)"
                            onclick="delete_confir('<?php echo $row['id'];?>','users.php')">Delete</a>
                    </td>
                </tr>
                <?php }  ?>
            </table>
            <?php } 
    else{
        echo "No data found";
    }
?>
        </div>
    </div>
</div>
</div>
<?php
include('footer.php');
?>