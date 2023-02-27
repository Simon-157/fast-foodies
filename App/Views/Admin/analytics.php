<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <title>Analytics</title>

    <link rel="stylesheet" href="public\css\styles.css" />
   <link rel="stylesheet" href="public\css\analytics.css" />
   <script defer src="public/scripts/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>

    <div class="s-layout">
        <!-- Sidebar -->
        <?php require("sidebar-items.php")?>


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

            <div class="analytics_container">
                <div class="cont_one">
                   <div class="mn">
                        <p class="div_name">Total Orders</p>
                        <p>54</p>
                   </div>
                </div>

                <div class="cont_one">
                    <div class="mn">
                         <p class="div_name">Total Customers</p>
                         <p>20</p>
                    </div>
                </div>

                <div class="cont_one">
                <div class="mn">
                        <p class="div_name">Total Revenue</p>
                        <p>200</p>
                </div>
                </div>
            </div>

            <div id="container">
                <h1><br>Restaurant Analytics<br></h1>
                <div id="chartContainer"></div>
            </div>


            <div id="pie-chart-container">
                <canvas id="chart"></canvas>
            </div>

        </main>


    </div>



    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>

    </script>
</body>
</html>