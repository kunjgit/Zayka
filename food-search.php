
    <?php include('partials-front/menu.php'); ?>
      
<style>
    
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
    

<link rel="stylesheet" href="homestyle.css" >
    
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center" >
        <div class="container" style="background:transparent">
            <?php 

                //Get the Search Keyword
                $search = $_POST['search'];
            
            ?>


            <h2 style="background:transparent"><a href="#" class="text-white" style="  font-family: logofont;  color: aqua; letter-spacing: 0.5mm;">Foods on Your Search "<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu" style=" color: white;background-color:black;">
        <div class="container" style=" color: white;background-color:black;">
            <h2 class="text-center"  style="  font-family: nancy;  color:#7ed756; letter-spacing: 0.5mm; ">Food Menu</h2>

            <?php 

                //SQL Query to Get foods based on search keyword
                $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether food available of not
                if($count>0)
                {
                    //Food Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php 
                                    // Check whether image name is available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php 

                                    }
                                ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">₹<?php echo $price; ?></p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //Food Not Available
                    echo "<div class='error'>Food not found.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>