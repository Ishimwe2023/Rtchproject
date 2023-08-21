<?php
@$id=$_GET['r_id'];
//connection
$connect=mysqli_connect("localhost","root","","ticket_reservation");
$done=mysqli_query($connect,"delete from route where r_id='$id'");
if($done){
    echo "<script>alert('Ok deleted')</script>";
    echo "<script>window.location='add route.php'</script>";
}
?>