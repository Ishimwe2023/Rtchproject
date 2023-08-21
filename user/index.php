<?php
session_start();
@$username=$_SESSION['username'];
@$status=$_SESSION['status'];
if(!isset($username))
{
    header("location:../Login.php");
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User interface</title>
    <link rel="stylesheet" href="user style.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="img/download (6).jpeg" alt="">
        </div>
        <h2> <em>Ritco transport company</em></h2>
        <div class="header-menu">
        <a href="logout.php">Log out</a>
           </div>
       </div> 
       <?php
       if($status=='active'){
        ?>
        div class="contents">
        <div class="navbar">
         <a href="index.php">Home</a>
         <a href="add route.php">Set route</a>
         <a href="verify ticket.php">Verify ticket</a>
         <a href="all ticket.php">All tickets</a>
         <a href="day.php">Day report</a>
        </div>
        <div class="slide-contents">
        <h2>
            WELCOME RITCO TICKET RESERVATION USER DASHBOARD</h2>
            <img src="img/download (1).jpeg" alt="">
        </div>
     </div> 
        <?php
       }else{
       ?>
        <a href="index.php">wait admin permission</a>
       <?php
       }
       ?>
       <
     <div class="footer">
        <div class="contact">
    <h2><em>Location</em></h2>
    <div class="img">
        <img src="img/img7.jpeg" alt="">
    </div>
        </div>
       
        <div class="location">
            <p> <span>Ritco Bus Offices<br></span>
                <span>Address: <br></span>
                KN 119 St Nyamirambo
                <span>Email: <br></span>
                info@ritco.rw or ritcoexpress@gmail.com
                <span>Tel: <br></span>
                +250 788 319 333
                P. O. Box: 619 Kigali, Rwanda 🇷🇼 
                <span>Tel: <br></span>
                +250-252575411 +250-252571241</p>
        </div>
    </div>
</body>
</html>