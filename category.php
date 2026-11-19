<?php
include('header.php');
checkUser();
adminArea();


if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id']) && $_GET['id']>0){
    $id=get_safe_value($_GET['id']);
    mysqli_query($con,"delete from category where id=$id");
    echo "</br>Data  deleted</br>";
}
$res=mysqli_query($con,"select * from category order by id desc ");
?>
<?php
  if(mysqli_num_rows($res)>0){
?>
<script>
    document.title="Category";
document.getElementById("category.php")
</script>
<div class="col-12 expense-container content">
    <div class="rounded h-100 p-4">
        <div class="table-responsive">
            <h2>Category</h2>
            <a href="manage_category.php">Add Category</a>
            </br></br>
            <table style="width: auto;" class="table">
                <thead class="table-heading">
                    <th class="col-1">Id</th>
                    <th class="col-1">Name</th>

                    <th class="col-1"></th>
                    </tr>
                </thead>
                <?php while($row=mysqli_fetch_assoc($res)){
?>
                <tr>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['name']?></td>
    <td>
       <a href="manage_category.php?id=<?php echo $row['id'];?>">Edit</a>&nbsp;
       <a href="javascript:void(0)"onclick="delete_confir('<?php echo $row['id'];?>','category.php')">Delete</a> 

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

