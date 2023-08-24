<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create account</title>
    <link rel="stylesheet" href="sign.css">
</head>
<body>
    <div class="create">
        <div class="h2">
            <h2> <em>Create account</em></h2>
        </div>
            <form action="Create.php" method="post">
                <label>Names:</label><br>
                <input type="text" name="name" required><br>
                <label>Phone:</label><br>
                <input type="text" name="phone" required><br>
                <label>Username:</label><br>
                <input type="text" name="uname" required><br>
                <label>Password:</label><br>
                <input type="password" name="psw" required><br>
                <label>Confirm-Password:</label><br>
                <input type="password" name="cpsw" required><br>
                <button type="submit" name="go">Register</button>
            </form>
    </div>
</body>
</html>
<?php
//connection
$connect=mysqli_connect("localhost","root","","ticket_reservation");
//declaration of variables
@$n=$_POST['name'];
@$phone=$_POST['phone'];
@$uname=$_POST['uname'];
@$psw=$_POST['psw'];
@$cpsw=$_POST['cpsw'];
@$go=$_POST['go'];
//query
if(isset($go)){
    $sel=mysqli_query($connect,"select username from customers where username='$uname'");
    $numrows=mysqli_num_rows($sel);
    if($numrows==0){
        if($psw==$cpsw){ 
        $result=mysqli_query($connect,"insert into customers values('','$n','$phone','$uname','$psw')");
    if($result){
        echo "<script>alert('Ok successfully!!')</script>";
        echo "<script>window.location='./Login.php'</script>";
    }
}else{
    echo "<script>alert('Mis matched password')</script>";
}
    }
    else{
        echo "<script>alert('Username taken')</script>"; 
    }
    
   
}
?>