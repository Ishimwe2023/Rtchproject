<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add direction</title>
    <link rel="stylesheet" href="style.css">
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
         <a href="add user.php">Add users</a>
         <a href="add bus.php">Add bus</a>
         <a href="add direction.php">Add direction</a>
         <a href="">All ticket</a>
         <a href="day report.php">Day report</a>
        </div>
        <div class="slide-contents">
            <div class="content1">
                <div class="form">
 <form action="add direction.php" method="post">
 <label>Description:</label><br>
                <input type="text" name="desc" required><br>
                <label>Price:</label><br>
                <input type="text" name="price" required><br>
                <label>Status:</label><br>
                <input type="text" name="status" required><br>
                <button type="submit" name="add">Add</button>
</form>
                </div>
                <div class="table">
                    <table border="1">
<tr>
    <td>d_id</td>
    <td>Description</td>
    <td>Price</td>
    <td>Status</td>
    <td>Date</td>
</tr>
<?php
//connection
$connect=mysqli_connect("localhost","root","","ticket_reservation");
//query
$date=date('d/m/20y');
$q=mysqli_query($connect,"select * from direction");
//while loop
while($data=mysqli_fetch_array($q)){
    ?>
    <tr>
    <td><?php echo $data['d_id']?></td>  
    <td><?php echo $data['description']?></td>
    <td><?php echo $data['price']?></td>
    <td><?php echo $data['status']?></td>
    <td><?php echo $date; ?></td>
    <td><a href="delete direction.php?d_id=<?php echo $data['d_id']?>">delete</a></td>
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
@$desc=$_POST['desc'];
@$price=$_POST['price'];
@$status=$_POST['status'];
@$add=$_POST['add'];
//query
if(isset($add)){
    $date=date('d/m/20y');
    $ok=mysqli_query($connect,"select description from direction where description='$desc'");
    $numrows=mysqli_num_rows($ok);
    if($numrows==0){
         $result=mysqli_query($connect,"insert into direction values('','$desc','$price','$status','$date')");
    if($result){
        echo "<script>alert('Ok added!')</script>";
        echo "<script>window.location='add direction.php'</script>";
    }
    }
   else{
    echo "<script>alert('Direction existed')</script>";
   }
}
?>