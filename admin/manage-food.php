<?php include('partials/menu.php');?>


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
<lottie-player src="https://assets10.lottiefiles.com/packages/lf20_snmohqxj/lottie_step2/data.json"  background="transparent"  speed="0.5"  style="width: 300px; height: 300px; margin-left:auto; margin-right:auto;"  loop  autoplay></lottie-player>

<body style="background-color:black; color:white;">
    <link rel="stylesheet" href="admin.css">
    <div class="main-content">
        <div class="wrapper">
            <h1 style="  font-family: logofont;  color:#7ed756; letter-spacing: 0.5mm;">Manage Food Items</h1>

            <br /><br />

            <!-- Button to Add Admin -->
            <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary" style="font-family: taglinefont;">Add Food</a>

            <br /><br /><br />

            <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if (isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if (isset($_SESSION['unauthorize'])) {
                echo $_SESSION['unauthorize'];
                unset($_SESSION['unauthorize']);
            }

            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            ?>



            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

                <?php
                //Create a SQL Query to Get all the Food
                $sql = "SELECT * FROM tbl_food";

                //Execute the qUery
                $res = mysqli_query($conn, $sql);

                //Count Rows to check whether we have foods or not
                $count = mysqli_num_rows($res);

                //Create Serial Number VAriable and Set Default VAlue as 1
                $sn = 1;

                if ($count > 0) {
                    //We have food in Database
                    //Get the Foods from Database and Display
                    while ($row = mysqli_fetch_assoc($res)) {
                        //get the values from individual columns
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                ?>

                        <tr>
                            <td><?php echo $sn++; ?>. </td>
                            <td><?php echo $title; ?></td>
                            <td>₹<?php echo $price; ?></td>
                            <td>
                                <?php
                                //CHeck whether we have image or not
                                if ($image_name == "") {
                                    //WE do not have image, DIslpay Error Message
                                    echo "<div class='error'>Image not Added.</div>";
                                } else {
                                    //WE Have Image, Display Image
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">
                                <?php
                                }
                                ?>
                            </td>
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary" style="font-family: taglinefont;">Update Food</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger" style="font-family: taglinefont;">Delete Food</a>
                            </td>
                        </tr>

                <?php
                    }
                } else {
                    //Food not Added in Database
                    echo "<tr> <td colspan='7' class='error'> Food not Added Yet. </td> </tr>";
                }

                ?>


            </table>
        </div>

    </div>
</body>

<?php include('partials/footer.php'); ?>