<?php
session_start();
require './class/connection.php';
$pid = $_POST['pid'];

if(isset($_POST['booknow']))
{
                  $date = $_POST['txt1'];
                  $userid = $_POST['txt2'];
                  $vid = $_POST['txt3'];
                  $bprice = $_POST['txt4'];
                  $bstatus = $_POST['txt5'];

                  $i = mysqli_query($connection, "insert into tbl_booking(booking_date,user_id,vendor_id,booking_price,booking_status)values('{$date}','{$userid}','{$vid}','{$bprice}','{$bstatus}')") or die(mysqli_error($connection));
                  $lastid = mysqli_insert_id($connection);
                  $ordet = mysqli_query($connection,"insert into tbl_booking_details(booking_id,booking_date,user_id,vendor_id,booking_price)values('{$lastid}','{$date}','{$userid}','{$vid}','{$bprice}')") or die(mysqli_error($connection));
                  if ($i) {

                      header("location:payment.php?pyd={$lastid}");
                  }  
}
if(isset($_POST['wishlist']))
{
                if(isset($_SESSION['vcart']))
                {
                    $cnum = $_SESSION['counter']+1;
                    $_SESSION['vcart'][$cnum] = $pid;


                     $_SESSION['counter'] = $cnum;
                }
                else
                {
                    $pcart = array();


                    $_SESSION['vcart'][0] = $pid;

                    $_SESSION['counter'] = 0;

                }
                header("location:view-cart.php");
}
?>
