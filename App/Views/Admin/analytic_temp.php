<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <title>Analytics Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="analytics.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body{
            background-color: #f0f0f0;
            font-family: sans-serif;
        }
        #container{
            width: 940px;
            margin: 0 auto;
            margin-bottom: 100px;
        }
        #chartContainer{
            width: 940px;
            height: 400px;
            margin-top: 10px;
        }

        #pie-chart-container {
        width: 500px;
        height: 500px;
        margin: 0 auto;
      }
    </style>

</head>
<body>

    <div class="s-layout">
        <!-- Sidebar -->
        <div class="s-layout__sidebar">
          <a class="s-sidebar__trigger" href="#0">
             <i style="color:white" class="bx bx-menu"></i>
          </a>
        
        <nav class="s-sidebar__nav">
            <ul>

                <li>
                    <a class="s-sidebar__nav-link name" href="#">
                       <i class="bx bx-dashboard"></i><em>Dashboard</em>
                    </a>
                </li>

                <li>
                    <a class="s-sidebar__nav-link" href="index.html">
                       <i class="bx bx-home"></i><em>Home</em>
                    </a>
                 </li>

                <li>
                   <a class="s-sidebar__nav-link" href="new-food.html">
                      <i class="bx bx-plus"></i><em>New Food</em>
                   </a>
                </li>
                
                <li>
                   <a class="s-sidebar__nav-link" href="table.html">
                     <i class="bx bx-dish"></i><em>Published Foods</em>
                   </a>
                </li>

                <li>
                    <a class="s-sidebar__nav-link" href="analytics.html">
                       <i class="bx bx-bar-chart"></i><em>Analytics</em>
                    </a>
                </li>

             </ul>
          </nav>
        </div>
        
 
        <!-- Main Content -->
        <main class="s-layout__content">
            <nav class="nav bd-container">
                <a href="#" class="header_name"><h1>Foodie</h1></a>
    
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="index.html" class="nav__link ">Jack Maaye </a></li>
                    </ul>
                </div>
            </nav>

            <div id="container">
                <h1><br>RestaurantName Analytics<br></h1>
                <div id="chartContainer"></div>
            </div>



            <div id="pie-chart-container">
                <canvas id="chart"></canvas>
            </div>

            

            <!-- New content should go here..
              -- Use display: flex, justify-content: center to center your content





            -->
        </main>
        

    </div>
    

    
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
        
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                title:{
                    text: "Order Volume by Day"
                },
                axisY: {
                    title: "Order Volume"
                },
                data: [{
                    type: "column",
                    showInLegend: true,
                    legendMarkerColor: "grey",
                    legendText: "Days",
                    dataPoints: [
                        { y: 10, label: "Monday" },
                        { y: 8, label: "Tuesday" },
                        { y: 15, label: "Wednesday" },
                        { y: 25, label: "Thursday" },
                        { y: 14, label: "Friday" },
                        { y: 18, label: "Saturday" },
                        { y: 25, label: "Sunday" }
                    ]
                }]
            });
            chart.render();

            
        }
        var ctx = document.getElementById("chart").getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
            labels: ['Pizza', 'Burgers', 'Sushi', 'Chinese', 'Mexican'],
            datasets: [{
                label: 'Food Delivery Orders',
                data: [20, 15, 10, 5, 25],
                backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(153, 102, 255)'
                ]
            }]
            },
            options: {}
        });
    </script>
</body>
</html>
