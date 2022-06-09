
<?php include('partials-front/menu.php');


error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
?>

    <?php 
        //CHeck whether food id is set or not
        if(isset($_GET['food_id']))
        {
            //Get the Food id and details of the selected food
            $food_id = $_GET['food_id'];

            //Get the DEtails of the SElected Food
            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1)
            {
                //WE Have DAta
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                //Food not Availabe
                //REdirect to Home Page
                header('location:'.SITEURL);
            }
        }
        else
        {
            //Redirect to homepage
            header('location:'.SITEURL);
        }
    ?>
 <link rel="stylesheet" href="admin.css">
    
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
    <!-- fOOD sEARCH Section Starts Here -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets7.lottiefiles.com/packages/lf20_0bcj2nvw.json"  background="black"  speed="0.5"  style="width: 300px; height: 300px; margin-left:auto; margin-right:auto;"  loop  autoplay></lottie-player>
    <section  style="background-color:black; color:white;">
        <div class="container" style="background-color:black; color:white;">
            
            <h2 class="text-center text-white" style="  font-family: logofont;  color:#7ed756; letter-spacing: 0.5mm; text-align:center; ">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset style="background-color:black; color:white:">
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php 
                        
                            //CHeck whether the image is available or not
                            if($image_name=="")
                            {
                                //Image not Availabe
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                //Image is Available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>
                        
                    </div>
    
                    <div class="food-menu-desc" style="background-color:black; color:white;">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">₹<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset style="background-color:black; color:white:">
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. mark  zukerburg" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9897969594" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. zuck@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 

                //CHeck whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form

                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty; // total = price x qty 

                    $order_date = date("Y-m-d h:i:sa"); //Order DAte

                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];


                    //Save the Order in Databaase
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO tbl_order SET 
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";

                    //echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if($res2==true)
                    {
                        //Query Executed and Order Saved
                        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        //Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                        header('location:'.SITEURL);
                    }

                }
            
            ?>

        </div>
    </section>

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets7.lottiefiles.com/packages/lf20_qn2snk.json"  background="black"  speed="1"  style="width: 300px; height: 300px; margin-left:auto; margin-right:auto;"  loop  autoplay></lottie-player>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>