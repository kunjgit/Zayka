
<?php include('partials/menu.php'); ?>





<style>
  
@import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Comfortaa&family=Fredoka+One&family=Modak&family=Nunito:wght@600&display=swap');


@font-face {
    src: url(/fonts/GarbataTrial-Extralight.ttf);
    font-family: nancy;
}

@font-face {
    src: url(fonts/Borsok\ 400.otf);
    font-family: logofont;
}

@font-face {
    src: url(fonts/Chloe-Regular.otf);
    font-family: taglinefont;
}

</style>

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets1.lottiefiles.com/packages/lf20_f4ltzsmt.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px; margin-left:auto; margin-right:auto;"  loop  autoplay></lottie-player>
<body style="background-color:black; color:white; ">
        <!-- Main Content Section Starts -->
        <div class="main-content" style="background-color:black; color:white;   font-size:0.5cm;  font-family: nancy; ">
            <div class="wrapper">
                <h1  style="  font-family: logofont;  color:#7ed756; letter-spacing: 0.5mm;" >Administrator Dashboard</h1>
                <br><br>
                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>

                <div class="col-4 text-center" style="background-color:black; color:white;    font-family: 'Comfortaa', cursive;  " >

                    <?php 
                        //Sql Query 
                        $sql = "SELECT * FROM tbl_category";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Food Categories
                </div>

                <div class="col-4 text-center" style="background-color:black; color:white;    font-family: 'Comfortaa', cursive; " >

                    <?php 
                        //Sql Query 
                        $sql2 = "SELECT * FROM tbl_food";
                        //Execute Query
                        $res2 = mysqli_query($conn, $sql2);
                        //Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Foods
                </div>

                <div class="col-4 text-center" style="background-color:black; color:white;    font-family: 'Comfortaa', cursive; " >
                    
                    <?php 
                        //Sql Query 
                        $sql3 = "SELECT * FROM tbl_order";
                        //Execute Query
                        $res3 = mysqli_query($conn, $sql3);
                        //Count Rows
                        $count3 = mysqli_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Total Orders
                </div>

                <div class="col-4 text-center" style="background-color:black; color:white;    font-family: 'Comfortaa', cursive; " >
                    
                    <?php 
                        //Creat SQL Query to Get Total Revenue Generated
                        //Aggregate Function in SQL
                        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

                        //Execute the Query
                        $res4 = mysqli_query($conn, $sql4);

                        //Get the VAlue
                        $row4 = mysqli_fetch_assoc($res4);
                        
                        //GEt the Total REvenue
                        $total_revenue = $row4['Total'];

                    ?>

                    <h1>₹<?php echo $total_revenue; ?></h1>
                    <br />
                    Revenue Generated
                </div>

                <div class="col-4 text-center" style="background-color:black; color:yellow;    font-family: 'Comfortaa', cursive; " >
                    
                    <?php 
                        //Sql Query 
                        $sql6 = "SELECT * FROM tbl_order WHERE status = 'Ordered'";
                        //Execute Query
                        $res6 = mysqli_query($conn, $sql6);
                        //Count Rows
                        $count6 = mysqli_num_rows($res6);
                    ?>

                    <h1><?php echo $count6; ?></h1>
                    <br />
                    Pending Orders
                </div>

                <div class="col-4 text-center" style="background-color:black; color:#7ed756 ;  font-family: 'Comfortaa', cursive; " >
                
                    <?php 
                        //Sql Query 
                        $sql7 = "SELECT * FROM tbl_order WHERE status = 'On Delivery'";
                        //Execute Query
                        $res7 = mysqli_query($conn, $sql7);
                        //Count Rows
                        $count7 = mysqli_num_rows($res7);
                    ?>

                    <h1><?php echo $count7; ?></h1>
                    <br />
                    On Delivery Orders
                </div>


                <div class="col-4 text-center" style="background-color:black; color:red;    font-family: 'Comfortaa', cursive; " >
                    
                    <?php 
                        //Sql Query 
                        $sql7 = "SELECT * FROM tbl_order WHERE status = 'Cancelled'";
                        //Execute Query
                        $res7 = mysqli_query($conn, $sql7);
                        //Count Rows
                        $count7 = mysqli_num_rows($res7);
                    ?>

                    <h1><?php echo $count7; ?></h1>
                    <br />
                    Cancelled Orders
                </div>


                <div class="col-4 text-center" style="background-color:black; color:white;    font-family: 'Comfortaa', cursive; " >
                    
                    <?php 
                        //Sql Query 
                        $sql8 = "SELECT * FROM tbl_admin";
                        //Execute Query
                        $res8 = mysqli_query($conn, $sql8);
                        //Count Rows
                        $count8 = mysqli_num_rows($res8);
                    ?>

                    <h1><?php echo $count8; ?></h1>
                    <br />
                    System Administrator
                </div>

                <div class="clearfix"></div>

            </div>
        </div>


       
        <!-- Main Content Setion Ends -->
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>    
        <br>    
        
        <br>
        <br>
                </body>
<?php include('partials/footer.php') ?>