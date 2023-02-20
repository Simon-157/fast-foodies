<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- css links -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <title>Add New Food</title>
    <link rel="stylesheet" href="public\css\styles.css" />
    <link rel="stylesheet" href="public\css\new-food.css" />

    <!-- scripts links -->
    <!-- <script charset="utf-8" src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script> -->
    <script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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
                    <a class="s-sidebar__nav-link" href="/fast-foodies/">
                       <i class="bx bx-home"></i><em>Home</em>
                    </a>
                 </li>

                <li>
                   <a class="s-sidebar__nav-link" href="/fast-foodies/new_food">
                      <i class="bx bx-plus"></i><em>New Food</em>
                   </a>
                </li>

                <li>
                   <a class="s-sidebar__nav-link" href="/fast-foodies/published">
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
                        <li class="nav__item"><a href="" class="nav__link "><?php echo $_SESSION['res_name'] ?></a></li>
                    </ul>
                </div>
            </nav>

            <!-- Foods Published  -->
            <div class="text_wrapper">
                <h2>Add New Food</h2>
            </div>

            <!-- Add new food -->
            <div class="new_food_wrapper">
                <span  id="msg"></span>
                <form id="food-form" class="form" name="food-form">

                    <div class="input_wrapper">
                        <label for="food_name">Food Name</label>
                        <input class="food_name" name= "food_name" type="text" >
                    </div>

                    <div class="input_wrapper">
                        <label for="food_name">Food Description</label>
                        <input class="food_desc" name = "food_description" type="text" >
                    </div>

                    
                    <div class="input_wrapper">
                        <label for="food_name">Price</label>
                        <input class="food_desc" type="number" name= "price">
                    </div>
                    
                    <div class="input_wrapper">
                        <label for="food_name">Quantity</label>
                        <input class="food_qty" type="number" name = "quantity">
                    </div>

                    <div class="input_wrapper_img   ">
                        <label for="food_name">Food Image</label>
                        <input type="hidden" role="uploadcare-uploader" 
                            data-public-key="e2ac7ad8c06a4a0b28b2"
                            data-images-only  class="uploadcare-widget"
                        >
                    </div>

                    <div class="input_wrapper">
                        <input class="submit_btn" type="submit" >
                    </div>

                </form>
            </div>

        </main>

    </div>


    <script  src="public/scripts/new-product.js"></script>

</body>
</html>
