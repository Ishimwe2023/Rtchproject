<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
    <link rel="stylesheet" href="add users.css">
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
            <div class="content2">
                <div class="form">
 <form action="add user.php" method="post" class="user">
                <label>Agent name:</label><br>
                <input type="text" name="a_name" required><br>
                <label>Phone:</label><br>
                <input type="text" name="phone" required><br>
                <label>Address:</label><br>
                <input type="text" name="address" required><br>
                <label>Username:</label><br>
                <input type="text" name="uname" required><br>
                <label>Password:</label><br>
                <input type="text" name="psw" required><br>
                <button type="submit" name="add">Add</button>
</form>
                </div>
                <div class="table">
                    <table border="1">
                        <tr>
                            <td>Agent name</td>
                            <td>Phone</td>
                            <td>Address</td>
                            <td>Username</td>
                            <td>Password</td>
                            <td>status</td>
                        </tr>
                        <?php
                        //connection
                        $connect=mysqli_connect("localhost","root","","ticket_reservation");
                        //query
                        $result=mysqli_query($connect,"select a_id,a_name,phone,address,username,password,status from agent");
                        //while loop
                        while($data=mysqli_fetch_array($result)){
                            ?>
                            <tr>
                            <td><?php echo $data['a_name']?></td>
                            <td><?php echo $data['phone']?></td>
                            <td><?php echo $data['address']?></td>
                            <td><?php echo $data['username']?></td>
                            <td><?php echo $data['password']?></td>
                            <td><?php echo $data['status']?></td>
                            
                        <?php
                        if($data['status']=='active'){
                            ?>
                            <td><a href="disactive.php?a_id=<?php echo $data['a_id'];?>"><button style="background-color:red;">Disactivate</button></a></td>
                            <?php
                        }
                        else{
                            ?>
                             <td><a href="active.php?a_id=<?php echo $data['a_id'];?>"><button>activate</button></a></td> 
                            <?php
                           
                        }
                        ?>
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
@$a_name=$_POST['a_name'];
@$phone=$_POST['phone'];
@$address=$_POST['address'];
@$uname=$_POST['uname'];
@$psw=$_POST['psw'];
@$add=$_POST['add'];
//query
if(isset($add)){
    $ok=mysqli_query($connect,"select a_name from agent where a_name='$a_name'");
    $numrows=mysqli_num_rows($ok);
    if($numrows==0){
         $result=mysqli_query($connect,"insert into agent values('','$a_name','$phone','$address','$uname','$psw','','active')");
    if($result){
        echo "<script>alert('Ok added!')</script>";
        echo "<script>window.location='add user.php'</script>";
    }
}
else{
    echo "<script>alert(' User added!')</script>";
}
    }
   
?>