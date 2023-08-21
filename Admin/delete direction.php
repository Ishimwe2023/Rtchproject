<?php
$id=$_GET['d_id'];
//connection
$connect=mysqli_connect("localhost","root","","ticket_reservation");
//query
$ok=mysqli_query($connect,"delete from direction where d_id=$id");
if($ok){
    echo "<script> alert('well deleted')</script>";
    echo "<script> window.location='add direction.php'</script>";
}
?>