<?php
session_start();
@$username =$_SESSION['username'];
@$id =$_SESSION['id'];
if(!isset($username))
{
    header("location:../Login.php");
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="style1.css">
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
       <div class="contents">
        <div class="navbar">
         <a href="index.php">Home</a>
         <a href="add user.php">Add users</a>
         <a href="add bus.php">Add bus</a>
         <a href="add direction.php">Add direction</a>
         <a href="">All ticket</a>
         <a href="day report.php">Day report</a>
        </div>
        <div class="slide-contents">
        <h2>
            WELCOME RITCO TICKET RESERVATION ADMIN DASHBOARD</h2>
            <div class="stastic">
                <div class="s_user">
                <h3>Number of users</h3>
                
                <p>
                    <?php
                    $connect=mysqli_connect("localhost","root","","ticket_reservation");
                    $done=mysqli_query($connect,"select count(a_name) as a_name from agent");
                    while($data=mysqli_fetch_array($done)){
                        $total=$data['a_name'];
                    }
                    ?>
                </p>
                <h1> <?php echo $total; ?> </h1>
            </div>
            <div class="s_user">
                <h3>Number of buss</h3>
                <p>
                
                    <?php
                    $connect=mysqli_connect("localhost","root","","ticket_reservation");
                    $done=mysqli_query($connect,"select count(b_id) as b_id from buss");
                    while($data=mysqli_fetch_array($done)){
                        $total1=$data['b_id'];
                    }
                    ?>
                </p>
                <h1> <?php echo $total1; ?> </h1>
            </div>
            <div class="s_user">
                <h3>Number of direction</h3>
                <p>
                    
                <?php
                    $connect=mysqli_connect("localhost","root","","ticket_reservation");
                    $done=mysqli_query($connect,"select count(d_id) as d_id from direction");
                    while($data=mysqli_fetch_array($done)){
                        $total2=$data['d_id'];
                    }
                    ?>
                </p>
                <h1> <?php echo $total2; ?> </h1>
            </div>
            </div>
            
        </div>
     </div> 
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