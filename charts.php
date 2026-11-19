<?php
header("Content-Type: application/json");
session_start();
$con=mysqli_connect('localhost','root','','expense');
$cat_id='';

if(isset($_GET['category_id']) && $_GET['category_id']>0) {
    $cat_id=get_safe_value($_GET['category_id']);
    
}
$res=mysqli_query($con,"select sum(expense.price) as price,category.name from expense,category where 
expense.category_id=category.id and expense.added_by='".$_SESSION['UID']."' group by expense.category_id");
$data=array();
 foreach ($res as $row) {
    $data[]=$row;
 }
echo json_encode($data);
?>
