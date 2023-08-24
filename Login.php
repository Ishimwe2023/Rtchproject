<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="sign.css">
</head>
<body>
    <div class="create">
        <div class="h2">
            <h2> <em>Login form</em></h2>
        </div>
        <form action="Login.php" method="post">
            <label >Username:</label><br>
            <input type="text" name="uname" required><br>
            <label >Password:</label><br>
            <input type="password" name="psw" required><br>
            <select name="select" >
                <option value="Customer">Customer</option>
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
            <button type="submit" name="go" class="login">Login</button>
        </form>
        <h1 class="or">Or</h1>
        <a href="Create.php" class="go">Create account</a>
    </div>
</body>
</html>
<?php
//connection
$connect=mysqli_connect("localhost","root","","ticket_reservation");
//declaration of variables
@$uname=$_POST['uname'];
@$psw=$_POST['psw'];
@$select=$_POST['select'];
@$go=$_POST['go'];
//query
if(isset($go))
{
    if($select=='Customer'){
$result=mysqli_query($connect,"select * from customers where username='$uname' and password='$psw'");
$numrows=mysqli_num_rows($result);
while($ok=mysqli_fetch_array($result)){
$cid=$ok['c_id'];
$names=$ok['username'];
}
}  
if($numrows==1){
    $_SESSION['c_id']=$cid;
    $_SESSION['username']=$names;
    echo "<script>alert('Well continue!!')</script>";
   echo "<script>window.location='./customers/customer.php'</script>";
}
 elseif($select==='User'){
    $result=mysqli_query($connect,"select * from agent where username='$uname' and password='$psw'");
    $numrows=mysqli_num_rows($result);
    while($ok=mysqli_fetch_array($result)){
        $status=$ok['status'];
        $username=$ok['username'];
    }
    }
    if($numrows==1){
        $_SESSION['status']=$status;
        $username =$_SESSION['username']=$username;
        echo "<script>alert('Well continue!!')</script>";
        echo "<script>window.location='./user/index.php'</script>";
    }
elseif($select==='Admin'){
    $result=mysqli_query($connect,"select * from admin where username='$uname' and password='$psw'");
    $numrows=mysqli_num_rows($result);
    while($ok=mysqli_fetch_array($result)){
        $username=$ok['username'];
    }
    if($numrows==1){
        $_SESSION['username']=$username;
        echo "<script>alert('Well continue!!')</script>";
        echo "<script>window.location='./Admin/index.php'</script>";
    }
}
    else{
        echo "<script>alert('Noooooo try again!!')</script>";  
    }  

}     
?>