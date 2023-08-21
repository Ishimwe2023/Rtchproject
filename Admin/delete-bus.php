<?php
//declaration
$id=$_GET['b_id'];
//connection
$connect=mysqli_connect("localhost","root","","ticket_reservation");
//query
$ok=mysqli_query($connect,"delete from buss where b_id=$id");
if($ok){
    echo "<script> alert('well deleted')</script>";
    echo "<script> window.location='add bus.php'</script>";
}
?>