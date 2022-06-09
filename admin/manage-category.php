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
<lottie-player src="https://assets10.lottiefiles.com/packages/lf20_njobaah2.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px; margin-left:auto; margin-right:auto;"  loop  autoplay></lottie-player>
<body  style="background-color:black; color:white; ">
<link rel="stylesheet" href="admin.css">
<div class="main-content" style="background-color:black; color:white; " >
    <div class="wrapper">
        <h1 style="  font-family: logofont;  color:#7ed756; letter-spacing: 0.5mm;" >Manage Food Category</h1>

        <br /><br />
        <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['no-category-found']))
            {
                echo $_SESSION['no-category-found'];
                unset($_SESSION['no-category-found']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }
        
        ?>
        <br><br>

                <!-- Button to Add Admin -->
                <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary"  style="font-family: taglinefont;">Add Category</a>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th style="font-family: nancy;">S.N.</th>
                        <th style="font-family: nancy;">Title</th>
                        <th style="font-family: nancy;">Image</th>
                        <th style="font-family: nancy;">Featured</th>
                        <th style="font-family: nancy;">Active</th>
                        <th style="font-family: nancy;">Actions</th>
                    </tr>

                    <?php 

                        //Query to Get all CAtegories from Database
                        $sql = "SELECT * FROM tbl_category";

                        //Execute Query
                        $res = mysqli_query($conn, $sql);

                        //Count Rows
                        $count = mysqli_num_rows($res);

                        //Create Serial Number Variable and assign value as 1
                        $sn=1;

                        //Check whether we have data in database or not
                        if($count>0)
                        {
                            //We have data in database
                            //get the data and display
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?>

                                    <tr  >
                                        <td style="background-color:black; color:white;    font-family: 'Comfortaa', cursive; " ><?php echo $sn++; ?>. </td>
                                        <td style="background-color:black; color:white;    font-family: 'Comfortaa', cursive; " ><?php echo $title; ?></td>

                                        <td style="background-color:black; color:white;    font-family: 'Comfortaa', cursive; " >

                                            <?php  
                                                //Chcek whether image name is available or not
                                                if($image_name!="")
                                                {
                                                    //Display the Image
                                                    ?>
                                                    
                                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px" >
                                                    
                                                    <?php
                                                }
                                                else
                                                {
                                                    //DIsplay the MEssage
                                                    echo "<div class='error'>Image not Added.</div>";
                                                }
                                            ?>

                                        </td>

                                        <td style="background-color:black; color:white;    font-family: 'Comfortaa', cursive; " ><?php echo $featured; ?></td>
                                        <td style="background-color:black; color:white;    font-family: 'Comfortaa', cursive; " ><?php echo $active; ?></td>
                                        <td style="background-color:black; color:white;    font-family: 'Comfortaa', cursive; " >
                                            <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary"  style="font-family: taglinefont;" >Update Category</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger" style="font-family: taglinefont;" >Delete Category</a>
                                        </td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //WE do not have data
                            //We'll display the message inside table
                            ?>

                            <tr>
                                <td colspan="6"><div class="error">No Category Added.</div></td>
                            </tr>

                            <?php
                        }
                    
                    ?>

                    

                    
                </table>
    </div>
    
</div>
                    </body>

<?php include('partials/footer.php'); ?>