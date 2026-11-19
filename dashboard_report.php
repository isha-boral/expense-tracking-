<?php
include('header.php');
checkUser();
userArea();
$from='';
$to='';
$sub_sql="";
if(isset($_GET['from'])) {
    $from=get_safe_value($_GET['from']);
}
if(isset($_GET['to'])) {
   $to=get_safe_value($_GET['to']);
}

if($from!=='' && $to!=''){
$sub_sql.=" and expense.expense_date between '$from' and '$to' ";
}
$res=mysqli_query($con,"select expense.price,category.name,expense.item,expense.expense_date from expense,category where 
expense.category_id=category.id and expense.added_by='".$_SESSION['UID']."'$sub_sql");

?>
<script>
    document.title="Dashboard Report";
document.getElementById("dashboard_report.php")
</script>
<div class="content container-1">
    <h2>Dashboard Reports</h2>
    <br>
    <?php if($from!='' && $to!=''){ ?>
    <h5 class="date-dashboard">From
    <?php echo $from?>
    To
    <?php echo $to?></h5>
    <?php } ?>
    <?php
if(mysqli_num_rows($res)>0) {
 ?>
    <div class="col-12 dashboard-report-content">
        <div class="rounded h-100 p-4">
            <div class="table-responsive container-2">
                <table style="width: auto;" class="table">
                    <thead class="table-heading">
                        <th class="col-1">Category</th>
                        <th class="col-1">Item</th>
                        <th class="col-1">Expense Date</th>
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
                                <?php echo $row['item']?>
                            </td>
                            <td>
                                <?php echo $row['expense_date']?>
                            </td>
                            <td>
                                <?php echo $row['price']?>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Total</th>
                            <th>
                                <?php echo $final_price?>
                            </th>
                        </tr>
                    </tbody>
                </table>
               <?php $data=array();
    foreach ($res as $rows) {
        $data[]=$rows;
     }
     $_SESSION['data']=$data?>
            </div>
            </div>
            <?php } else {
    echo "<b>No data found<b>";
}
?>
</div>
<h2 class=graph-heading>Graph</h2>
<div class="col-12 report-chart">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded">
                            
                            <canvas id="pie-chart"></canvas>
                        </div>
                    </div>
                    </div>
</div>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">var jArray =<?php echo json_encode($data); ?></script>
<script type="text/javascript" src="js\main1.js"></script>
            <?php
include('footer.php');
?>

