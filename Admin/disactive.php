<?php
$connect=mysqli_connect("localhost","root","","ticket_reservation");
$id=$_GET['a_id'];
$done=mysqli_query($connect,"update agent set status='disactive'  where a_id='$id'");
if($done){
echo "<script>alert('Well updated')</script>";
echo "<script> window.location='add user.php'</script>";
}
?>