const activePage= window.location.pathname;
const activePageLink="http://127.0.0.1"+activePage
const navLinks=document.querySelectorAll(".nav-link").forEach(link=>{
    if(link.href === activePageLink){
        link.className="nav-link active"
    }
})
function change_cat(){
    var category_id=document.getElementById('category_id').value;
    window.location.href='?category_id='+ category_id;
}

function delete_confir(id,page) {
   var check=confirm("Are you sure");
   if(check==true){
    window.location.href=page+
    "?type=delete&id="+id;
   }
}

function set_to_date() {
    var from_date=document.getElementById('from_date').value;
    document.getElementById('to_date').setAttribute("min",from_date);
}

$(document).ready(function(){
   $.ajax({
    url:"http://127.0.0.1/expense/charts.php",
    method:"GET",
    success:function(data){
        // console.log(data);
        var category=[]
        var price=[]
      for (var i in data){
        category.push(data[i].name);
        price.push(data[i].price)
      }  
      
      var ctx1 = $("#bar-chart").get(0).getContext("2d");
      var myChart1 = new Chart(ctx1, {
        type: "bar",
        data: {
            labels:category,
            datasets: [{
                label: 'Price',
                backgroundColor: [
                    'rgba(54, 162, 235, 0.7)',
      'rgba(153, 102, 255, 0.7)',
      'rgba(201, 203, 207, 0.7)',
                'rgba(255, 99, 132, 0.7)',
      'rgba(255, 159, 64, 0.7)',
      'rgba(255, 205, 86, 0.7)',
      'rgba(75, 192, 192, 0.7)'
      
                ],
                data:price
            }]
        },
        options: {
            responsive: true
        }
    });
    var ctx2 = $("#line-chart").get(0).getContext("2d");
var myChart2 = new Chart(ctx2, {
    type: "line",
    data: {
        labels:category,
        datasets: [{
            label: "Price",
            fill: true,
            backgroundColor: "rgba(255, 99, 132,0.7)",
            data:price
        }]
    },
    options: {
        responsive: true
    }
});
    },
    
    error:function(data){
        // console.log(data);
        },


   });
});


 // Sidebar Toggler
 $('.sidebar-toggler').click(function () {
    $('.sidebar, .content,.top-navbar').toggleClass("open");
    return false;
});
