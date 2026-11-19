<?php
include('header.php');
checkUser();
userArea();
if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id']) && $_GET['id']>0){
    $id=get_safe_value($_GET['id']);
    mysqli_query($con,"delete from expense where id=$id");
    echo "</br>Data  deleted</br>";
}
$res=mysqli_query($con,"select expense.*,category.name from expense,category  where expense.category_id=category.id and expense.added_by='".$_SESSION['UID']."'
order by expense.expense_date asc");

?>
<script>
    document.title="Expense";
document.getElementById("expense.php")
</script>


        
<div class="content col-12 expense-container">

    <div class="rounded h-100 p-4">
    <h2>Expense</h2>
    <a href="manage_expense.php">Add Expense</a>
        <div class="table-responsive">
            </br>
            <table style="width: auto;" class="table">
                <thead class="table-heading">
                    <th class="col-1">Id</th>
                    <th class="col-1">Category</th>
                    <th class="col-1">Item</th>
                    <th class="col-1">Price</th>
                    <th class="col-1">Expense Date</th>
                    <th class="col-1"></th>
                    </tr>
                </thead>
                <?php
if(mysqli_num_rows($res)>0){
 ?>
                <?php while($row=mysqli_fetch_assoc($res)) {?>
                <tbody>
                    <tr>
                        <td>
                            <?php echo $row['id'];?>
                        </td>
                        <td>
                            <?php echo $row['name']?>
                        </td>
                        <td>
                            <?php echo $row['item']?>
                        </td>
                        <td>
                            <?php echo $row['price']?>
                        </td>
                        <td>
                            <?php echo $row['expense_date']?>
                        </td>
                        <td>
                            <a href="manage_expense.php?id=<?php echo $row['id'];?>">Edit</a>&nbsp;
                            <a href="javascript:void(0)" onclick="delete_confir('<?php echo $row['id'];?>','expense.php')">Delete</a>
                            
                        </td>
                    </tr>
              
                <?php }  ?>
           
            <?php }
    else {?>
           <tr>
        <td colspan="5">
          No Records Found
        </td>
    </tr>
    <?php } ?>
      
      </tbody>
      </table>
    </div>
    </div>
</div>
</div>

<?php
include('footer.php');
?>