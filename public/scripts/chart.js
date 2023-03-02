
$(document).ready(function() {

    // Use AJAX to get data from the API
    $.ajax({
      url: '/fast-foodies/getanalytics',
      type: 'GET',
      success: function(response) {
  
        // Parse the response and extract the data

        response = JSON.parse(response); // Parse the JSON string
        
        let newValues = response.map(function (row) {
          return parseFloat(row.Revenue);
        });
    
        let newLabels = response.map(function (row) {
          return row.Day;
        });
        

        var sum = 0;
     
        // Calculation the sum using forEach
        newValues.forEach(x => {
            sum += x;
        });

         var rev = document.getElementById("total_rev")
         var ini = document.getElementById("total_rev").innerText;
         var cus = document.getElementById("total_cus");
         console.log(ini);
         rev.innerText = ini + " " + sum;
         cus.innerText = newValues.length;
        // Use Chart.js to create a bar graph
        var ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: newLabels,
            datasets: [{
              label: 'Revenue',
              data: newValues,
              backgroundColor: [
                "rgb(255, 99, 32)",
                "rgba(255, 99, 190)",
                "rgb(54, 162, 231)",
                "rgb(255, 255, 255)",
                "rgb(105, 105, 105)",
                "rgb(14, 162, 131)",
                "rgb(35, 65, 55)",
                "rgb(25, 205, 105)",
              ],
              borderColor: "rgba(255, 99, 132, 0.2)",
              weight: 5,
              borderWidth: 2,
              barThickness: 40,
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  // Remove the ticks property
                }
              }]
            }
          }
        });
      }
    });
  });
  