<?php include('partials/menu.php'); 


error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);?>
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
<lottie-player src="https://assets6.lottiefiles.com/private_files/lf30_rnizksef.json"  background="transparent"  speed="0.8"  style="width: 300px; height: 300px; margin-left:auto; margin-right:auto;"  loop  autoplay></lottie-player>

<link rel="stylesheet" href="admin.css">
<div class="main-content">
    <div class="wrapper">
        <h1 style="  font-family: logofont;  color:#7ed756; letter-spacing: 0.5mm;">Manage Food Order</h1>

                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <br><br>

                <table class="tbl-full">
                    <tr>
                        <th width="5%">#</th>
                        <th width="10%">Order Date</th>
                        <th width="10%">Food</th>
                        <th width="5%">Price</th>
                        <th width="5%">Qty</th>
                        <th width="6%">Total</th>
                        <th width="8%">Status</th>
                        <th width="10%">Customer</th>
                        <th width="10%">Contact</th>
                        <th width="15%">Email</th>
                        <th width="10%">Address</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        //Get all the orders from database
                        $sql = "SELECT * FROM tbl_order ORDER BY id DESC"; // DIsplay the Latest Order at First
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; //Create a Serial Number and set its initail value as 1

                        if($count>0)
                        {
                            //Order Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the order details
                                $id = $row['id'];
                                $food = $row['food'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];
                                
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $order_date; ?></td>
                                        <td><?php echo $food; ?></td>
                                        <td><?php echo '₹'.$price; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo '₹'.$total; ?></td>
                                        

                                        <td>
                                            <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled

                                                if($status=="Ordered")
                                                {
                                                    echo "<label style='color: blue;   font-family: taglinefont; ' >$status</label>";
                                                }
                                                elseif($status=="On Delivery")
                                                {
                                                    echo "<label style='color: orange;  font-family: taglinefont; '>$status</label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label><b style='color: green;  font-family: taglinefont; '>$status</b></label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='color: red;  font-family: taglinefont; '>$status</label>";
                                                }
                                            ?>
                                        </td>

                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_contact; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $customer_address; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary" style="font-family: taglinefont;">Update Order</a>
                                        </td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {   
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                        }
                        

error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
                    ?>

 
                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>