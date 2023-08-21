
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day report</title>
    <link rel="stylesheet" href="day report.css">
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
         <a href="add route.php">Set route</a>
         <a href="verify ticket.php">Verify ticket</a>
         <a href="all ticket.php">All tickets</a>
         <a href="day.php">Day report</a>
        </div>
        <div class="slide-contents">
        

<div class="card">
            <h2>Day report</h2>
            <div class="desc">
                <table border="1">
                    <tr>
            <td>Description</td>
            <td>Buss_type</td>
            <td>Plate no</td>
            <td>Price</td>
            <td>Date</td>
         </tr>
          <?php
          //connection
          $connect=mysqli_connect("localhost","root","","ticket_reservation");
          $date=date('d/m/20y');
          $ok1=mysqli_query($connect,"select sum(price) as price from direction");
          while($data1=mysqli_fetch_array($ok1)){
            $total=$data1['price'];
        }
          //query
          $done=mysqli_query($connect,"select description,type,b_plate_no,price,route.date from buss,direction,route where route.b_id=buss.b_id and 
          route.d_id=direction.d_id and date='$date'");
          while($data=mysqli_fetch_array($done)){
            ?>
            <tr>
                <td><?php echo $data['description'];?></td>
                <td><?php echo $data['type'];?></td>
                <td><?php echo $data['b_plate_no'];?></td>
                <td><?php echo $data['price'];?></td>
                <td><?php echo $data['route.date'];?></td>
            </tr>
           
            <?php
          }
              ?>
         
                </table>
                <h2>Total price:<?php echo $total; ?></h2>
         
            
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