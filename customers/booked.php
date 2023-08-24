<?php
session_start();
@$cid=$_SESSION['c_id'];
@$tid=$_SESSION['t_id'];
@$rid=$_SESSION['r_id'];
if(!isset($cid)){
    header("location:../Login.php");
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked ticket</title>
    <link rel="stylesheet" href="style.css">
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
        <a href="customer.php">Home</a>
         <a href="">News</a>
         <a href="booked.php">Booked tickets</a>
         <a href="">Contacts</a>
        </div>
        <div class="slide-contents">
         
         <?php
          //connection
          $connect=mysqli_connect("localhost","root","","ticket_reservation");
          //query
          $done=mysqli_query($connect,"select tichet.status,description,time,route.date,b_plate_no,t_id,c_name from direction,buss,route,tichet,customers where route.d_id=direction.d_id and route.b_id=buss.b_id and tichet.c_id=customers.c_id 
          and tichet.r_id=route.r_id and customers.c_id='$cid'");
          while($data=mysqli_fetch_array($done)){
              ?>

<div class="card">
            <h2>booked ticket</h2>
            <div class="desc">
            <tr>
        <td> <u><b>Ticket id:</b></u><br><?php echo $data['t_id']?></td><br>
        <td><u><b>Customer name:</b></u><br><?php echo $data['c_name']?></td><br>
        <td><u><b>Description:</b></u><br><?php echo $data['description']?></td><br>
        <td><u><b>Time fro travel:</b></u><br><?php echo $data['time']?></td><br>
        <td><u><b>Date</b></u><br><?php echo $data['date']?></td><br>
        <td><u><b>Buss plate no:</b></u><br><?php echo $data['b_plate_no']?></td><br>
        <td><u><b>Status:</b></u><br><?php echo $data['status']?></td>
            </tr>
            </div>
           
         </div>
              <?php
          }
         ?>
         
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