<?php
$who=$_SESSION['login'];
           $query ="UPDATE users SET visits = CURRENT_TIMESTAMP WHERE login='$who' ";
 $visits  = mysqli_query( $connect, $query);
$query ="SELECT * FROM users WHERE login='$who' ";
 $user  = mysqli_query( $connect, $query);
$row = mysqli_fetch_assoc($user);
$_SESSION['username']=$row['user_name'];
$_SESSION['userid']=$row['id'];
?>