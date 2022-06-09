<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Food Order System</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="homestyle.css">
</head>
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

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
        <div class="row" >
        <img class="logo" src="logo.jpg" alt="logo of zayka">

        <g>Zayka
            <br>
            <br>
            <b>aaj kya khaana pasand karoge??!</b>
        </g>
            </div>

            <div class="menu text-right" >
                <ul>
                    <li>
                        <a   style="font-family: taglinefont; color: aqua; font-size:0.7cm"  href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a  style="font-family: taglinefont; color: aqua;  font-size:0.7cm "  href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a   style="font-family: taglinefont; color: aqua;   font-size:0.7cm" href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a  style="font-family: taglinefont; color: aqua;   font-size:0.7cm "  href="logout.php">Logout</a>
                    </li>
                    <li>
                        <a  style="font-family: taglinefont; color: aqua;   font-size:0.7cm "  href="admin/login.php">Admin</a>
                    </li>
                    <li>
                        <a  style="font-family: taglinefont; color: aqua;   font-size:0.7cm "  href="reset-password.php">Reset password</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->