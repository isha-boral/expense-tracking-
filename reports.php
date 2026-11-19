<?php
include('header.php');
checkUser();
userArea();

$cat_id='';
$sub_sql='';
$from='';
$to='';
if(isset($_GET['category_id']) && $_GET['category_id']>0) {
    $cat_id=get_safe_value($_GET['category_id']);
    $sub_sql=" and category.id=$cat_id";

 }
 if(isset($_GET['from'])) {
      $from=get_safe_value($_GET['from']);
 }
 if(isset($_GET['to'])) {
     $to=get_safe_value($_GET['to']);
 }

if($from!=='' && $to!=''){
 $sub_sql.=" and expense.expense_date between '$from' and '$to' ";
}

$res=mysqli_query($con,"select sum(expense.price) as price,category.name from expense,category where 
expense.category_id=category.id $sub_sql and expense.added_by='".$_SESSION['UID']."' group by expense.category_id");
?>
<script>
    document.title="Reports";
document.getElementById("reports.php")
</script>
<div class="content">
    <h2>Reports</h2>
    <form type="get" class="form-horizontal">
        <div class="form-group d-grid gap-2">
            <div class="row">
                <label for="date" class="col-sm-1 col-form-label report-label">From</label>
                <div class="col-sm-12">
                    <div class="input-group date" id="datepicker">
                        <input type="date" class="form-control" name="from" value=
   "<?php echo $from?>" max="<?php echo date('Y-m-d')?>" onchange="set_to_date()" id="from_date">
                    </div>
                </div>
            </div>

        </div>
        &nbsp;&nbsp;&nbsp;
        <div class="form-group d-grid gap-2">
            <div class="row">
                <label for="date" class="col-sm-1 col-form-label report-label">To</label>
                <div class="col-sm-12">
                    <div class="input-group date" id="datepicker">
                        <input type="date" class="form-control" name="to" value="<?php echo $to?>" max="<?php echo date('Y-m-d')?>" id="to_date">
                    </div>
                </div>
            </div>
        </div>
        &nbsp;&nbsp;&nbsp;

        <div>
            <?php echo getCategory($cat_id,'reports');?>
            <br>
            <div class="form-group d-grid gap-2">
                <input type="submit" name="submit" value="submit"  class="btn text-light">
            </div></br>
            &nbsp;&nbsp;<a href="reports.php">Reset</a>
        </div>
    </form>

    <?php
if(mysqli_num_rows($res)>0) {
 ?>
    </br></br>
    <div class="col-12 report-container">
        <div class="rounded h-100 p-4">
            <div class="table-responsive container-2">
                <table class="table">
                    <thead class="table-heading">
                        <th class="col-1">Category</th>
                        <th class="col-1">Price</th>
                        </tr>
                    </thead>


                    <?php 
    $final_price=0;
    while($row=mysqli_fetch_assoc($res)) { 
    $final_price= $final_price+$row['price'];
    ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $row['name']?>
                            </td>
                            <td>
                                <?php echo $row['price']?>
                            </td>
                        </tr>
                        <?php } ?>

                        <tr>
                            <th>Total</th>
                            <th>
                                <?php echo $final_price?>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php } else {
    echo "<em>No data found<em>";
}
?>
</div>
            <?php
include('footer.php');
?>

