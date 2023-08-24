<?php
session_start();
 @$cid=$_SESSION['c_id'];
if(!isset($cid)){
    header("location:../Login.php");
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers interface</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="img/download (6).jpeg" alt="">
        </div>
       <script>alert("Welcome <?php echo $names;?>")</script>
        <h2> <em>Ritco transport company</em></h2>
        <div class="header-menu">
           <a href="logout.php">Log out</a>
           </div>
       </div> 
       <div class="contents">
        <div class="navbar">
         <a href="">Home</a>
         <a href="">News</a>
         <a href="booked.php">Booked tickets</a>
         <a href="">Contacts</a>
        </div>
        <div class="slide-contents">
         
         <?php
          //connection
          $connect=mysqli_connect("localhost","root","","ticket_reservation");
          //query
          $done=mysqli_query($connect,"select r_id,description,time,route.date,b_plate_no from direction,route,buss where route.d_id=direction.d_id and route.b_id=buss.b_id");
          while($data=mysqli_fetch_array($done)){
              ?>
<div class="card">
            <h2>Description of routes</h2>
            <div class="des">
            <tr>
        <td><?php echo $data['description']?></td><br>
        <td><?php echo $data['time']?></td><br>
        <td><?php echo $data['date']?></td><br>
        <td><?php echo $data['b_plate_no']?></td>
            </tr>
            </div>
            <img src="img/download (1).jpeg" alt=""><br>
            <div class="link">
                <a href="book.php?id=<?php echo $data['r_id'];?>">View more</a>
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