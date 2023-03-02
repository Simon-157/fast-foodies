<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <title>Analytics</title>
    <link rel="shortcut icon" href="public/assets/fafod.ico" type="image/x-icon">

    <link rel="stylesheet" href="public/css/styles.css" />
    <link rel="stylesheet" href="public/css/new-food.css" />
    <link rel="stylesheet" href="public/css/analytics.css" />
    

    </head>

<body>

    <div class="s-layout">
        <!-- Sidebar -->
        <?php require("sidebar-items.php") ?>


        <!-- Main Content -->
        <main class="s-layout__content">
            <nav class="nav bd-container">

                <a href="#" class="header_name" id="nav-menu">
                    <h1 id="res_name">Foodie</h1>
                    <span style="margin-left:5px">Analytics Dashboard</span>
                </a>

            </nav>

            <div class="analytics_container">
                <div class="cont_one">
                    <div class="mn">
                        <p class="div_name">Total Orders</p>
                        <p id="total_cus"></p>
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
                        <p id="total_rev">&#8373</p>
                    </div>
                </div>
            </div>

            <div id="container">
                <canvas id="myChart"></canvas>
            </div>


            <div id="pie-chart-container">
            </div>

        </main>


    </div>



    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="public/scripts/chart.js"></script>
    <script src="public/scripts/resprofile.js"></script>
</body>

</html>