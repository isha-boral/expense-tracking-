<?php
include('header.php');
checkUser();
userArea();
?>
<script>
document.title="Dashboard";
document.getElementById("dashboard.php")
</script>
        <div class="content dashboard-content">
            <div class="container-fluid detail-container">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="card-1 rounded d-flex align-items-center justify-content-between p-4">
                        <div class="circle-1"> 
                        <i class=" fa-solid fa-calendar-day fa-3x text-white px-4"></i>
</div>
                            <div class="px-4 text-white ">
                            <h6 class="text-white ">Today's Expense</h6>
                            <h5 class="text-white "><?php echo getDashboardExpense('today')?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="card-2 rounded d-flex align-items-center justify-content-between p-4">
                        <div class="circle-2"> 
                            <i class="fas fa-history fa-3x text-light px-4"></i>
                            </div>
                            <div class="px-4 text-white ">
                            <h6 class="text-white ">Yesterday's Expense	</h6>
                            <h5 class="text-white "> <?php echo getDashboardExpense('yesterday')?></h5>
                            </div>
                        </div>
                    </div>
                    <div class=" col-sm-12 col-md-6 col-xl-4">
                        <div class="card-3 rounded d-flex align-items-center justify-content-between p-4">
                        <div class="circle-3"> 
                            <i class="fa-solid fa-calendar-week fa-3x text-white px-4"></i>
                            </div>
                            <div class="px-4 text-white ">
                            <h6 class="text-white ">This Week Expense</h6>
                            <h5 class="text-white "><?php echo getDashboardExpense('week')?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="card-4 rounded d-flex align-items-center justify-content-between p-4">
                        <div class="circle-4"> 
                            <i class="fa-solid fa-calendar-days fa-3x text-white px-4"></i>
                            </div>
                            <div class="px-4 text-white ">
                            <h6 class="text-white ">This Month Expense	</h6>
                                <h5 class="text-white "><?php echo getDashboardExpense('month')?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="card-5 rounded d-flex align-items-center justify-content-between p-4">
                        <div class="circle-5"> 
                            <i class="fa-regular fa-calendar fa-3x text-white px-4"></i>
                            </div>
                            <div class="px-4 text-white ">
                                <h6 class="text-white ">This Year Expense</h6>
                                <h5 class="text-white "><?php echo getDashboardExpense('year')?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4 text-white ">
                        <div class="card-6 rounded d-flex align-items-center justify-content-between p-4">
                        <div class="circle-6"> 
                            <i class="fa-solid fa-indian-rupee-sign fa-3x text-white px-4"></i>
                            </div>
                            <div class="px-4 text-white">
                            <h6 class="text-white ">
                                Total Expense</h6>
                                <h5 class="text-white "><?php echo "\n"; echo getDashboardExpense('total')?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid pt-4 px-4 expense-container">
                            <div class="row g-4">
                            <div class=" container-2">
                                <h5>Recently Added</h5>
                <table style="width: auto;" class="table">
                    <thead class="table-heading">
                    <th class="col-1">Id</th>
                        <th class="col-1">Category</th>
                        <th class="col-1">Item</th>
                        <th class="col-1">Price</th>
                        <th class="col-1">Expense Date</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php $query="SELECT expense.*,category.name from expense,category where expense.category_id=category.id and expense.added_by='".$_SESSION['UID']."'ORDER BY id DESC LIMIT 4";
                        $query_run = mysqli_query($con,$query);
                        if(mysqli_num_rows($query_run)>0){
                           foreach($query_run as $row){?>
                            <tr>
                            <td>
                                <?php echo $row['id']?>
                            </td>
                            <td>
                                <?php  echo $row['name']?>
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
                        </tr>

                        <?php   }
                        }
                        else{?>
                         <tr>
        <td colspan="5">
          No Records Found
        </td>
    </tr>
                       <?php }
                        ?>
                       
                        </tbody>
                        </table>
                            </div>
                        </div>
                        
                    </div>
                    <div class="container-fluid">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-200 w-200">
                            <h6 class="mb-4">Bar Chart</h6>
                            <canvas id="bar-chart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-200 w-100">
                            <h6 class="mb-4">Line Chart</h6>
                            <canvas id="line-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        
 <?php
include('footer.php');
?> 




