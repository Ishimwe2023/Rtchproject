
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify ticket</title>
    <link rel="stylesheet" href="./user style.css">
</head>
<body>
<div class="header">
        <div class="logo">
            <img src="img/download (6).jpeg" alt="">
        </div>
        <h2> <em>Ritco transport company</em></h2>
        <div class="header-menu">
            <a href="./Login.php">Log out</a>
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
            <div class="content1">
                <div class="form">
                    <h2>
                        Ticket Verification
                    </h2>
 <form action="verify ticket.php" method="post">
                <label >Ticket id</label><br>
<input type="number" name="vid" required><br>
<button type="submit" name="verify">Verify</button>
</form>
                </div>
                <div class="table">

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
<?php
//connection
$connect=mysqli_connect("localhost","root","","ticket_reservation");
//declaration of variable
@$vid=$_POST['vid'];
@$btn=$_POST['verify'];
if(isset($btn)){
    $done=mysqli_query($connect,"select * from tichet where t_id='$vid'");
   while($data=mysqli_fetch_array($done)){
    $status=$data['status'];
   }
    if($status=='paid'){
         $result=mysqli_query($connect,"update tichet set status='verfied' where t_id='$vid'");
    if($result){
        echo "<script>alert('Well verfied')</script>";
        echo "<script>window.location='../customers/booked.php'</script>";
    } 
    }
    else{
        echo "<script>alert('Ticket verfied please')</script>";
    }
}

?>