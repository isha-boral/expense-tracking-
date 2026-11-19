    var category=[]
    var price=[]
  for (var i in jArray){
    category.push(jArray[i].name);
    price.push(jArray[i].price)
  } 
var ctx1 = $("#pie-chart").get(0).getContext("2d");
    var myChart1 = new Chart(ctx1, {
        type: "pie",
        data: {
            labels: category,
            datasets: [{
                backgroundColor: [
                    'rgba(255, 99, 132,1)',
      'rgba(255, 159, 64, 1)',
      'rgba(255, 205, 86,1)',
      'rgba(75, 192, 192,1)',
      'rgba(54, 162, 235,1)',
      'rgba(153, 102, 255,1)',
      'rgba(201, 203, 207,1)'
                ],
                data: price
            }]
        },
        options: {
            responsive: true
        }
    });
    
   
        