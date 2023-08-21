<?php
session_start();
 @$cid=$_SESSION['c_id'];
@$names=$_SESSION['username'];
 @$id=$_GET['id'];

?>
 <?php

               $connect=mysqli_connect("localhost","root","","ticket_reservation");
                $ok=mysqli_query($connect,"insert into tichet values('','$cid','$id','paid')");
                $result=mysqli_query($connect,"select * from tichet");
                while($done=mysqli_fetch_array($result)){
                   $tid=$done['t_id'];
                   $id=$done['r_id'];

                }
                if($ok){
                    $rid=$_SESSION['r_id']=$id;
                    $tid=$_SESSION['t_id']=$tid;
                    
                    echo"<script>alert('ok paid')</script>";
                    echo"<script>window.location='customer.php'</script>";
                }
              
               ?>



