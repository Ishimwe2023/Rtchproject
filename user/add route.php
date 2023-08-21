<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add route</title>
    <link rel="stylesheet" href="./add route.css">
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
                        Set Route
                    </h2>
 <form action="add route.php" method="post">
                <label>Direction:</label><br>
                <select name="did">
                   
               <?php


$connect=mysqli_connect("localhost","root","","ticket_reservation");
//query
$q=mysqli_query($connect,"select * from direction");
//while loop
while($data=mysqli_fetch_array($q)){
    ?>
 <option value="<?php echo $data['0'];?>"><?php echo $data['1'];?></option>
    <?php

}


?>
                </select><br>
                <label>Time:</label><br>
                <select name="time">
                    <option value="7:00">7:00</option>
                    <option value="8:00">8:00</option>
                    <option value="9:00">9:00</option>
                    <option value="10:00">10:00</option>
                </select><br>
                <label>Plate no:</label><br>
                <select name="b_id">
                   <?php
//connection
$connect=mysqli_connect("localhost","root","","ticket_reservation");
//query
$q=mysqli_query($connect,"select * from buss");
//while loop
while($data=mysqli_fetch_array($q)){
?>
<option value="<?php echo $data['0'];?>"><?php echo $data['1'];?></option>
<?php
}
?>


?>
                </select>
         <button type="submit" name="direction">Set route</button>
</form>
                </div>
                <div class="table">
        <table border="1">
            <tr>
        <td>Direction</td>
        <td>Time</td>
        <td>Date</td>
        <td>Plate no</td>
            </tr>
            <?php
            //connection
$connect=mysqli_connect("localhost","root","","ticket_reservation");
          //query
 $done=mysqli_query($connect,"select r_id,description,time,date,b_plate_no from direction,route,buss where route.d_id=direction.d_id and route.b_id=buss.b_id");
 while($data=mysqli_fetch_array($done)){
    ?>
      <tr>
        <td><?php echo $data['description']?></td>
        <td><?php echo $data['time']?></td>
        <td><?php echo $data['date']?></td>
        <td><?php echo $data['b_plate_no']?></td>
        <td> <a href="delete.php?r_id=<?php echo $data['r_id'];?>"> Delete</a></td>
            </tr>
    <?php
 }
            ?>
        </table>
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
//declaration of variables
@$did=$_POST['did'];
@$time=$_POST['time'];
@$date= Date('d/m/20y');
@$b_id=$_POST['b_id'];
@$direction=$_POST['direction'];
//query
if(isset($direction)){
    $ok=mysqli_query($connect,"select d_id,date from route where d_id='$did' and date='$date'");
    $numrows=mysqli_num_rows($ok);
    if($numrows==0){
        $done=mysqli_query($connect,"insert into route values('','$b_id','$did','$time','$date','')");
if($done){
    echo "<script>alert('Ok route are added')</script>";
    echo "<script>window.location='add route.php'</script>";
}
    }

else{
    echo "<script>alert('Route existed')</script>";
}
}
?>