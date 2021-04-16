<?php 
  
include("db.php"); 
$idnews = $_POST['idnews'];  
$idauthor  = $_POST['idauthor'];    
$msg = $_POST['msg'];    
mysqli_query($connect, "INSERT INTO comments 
(id_post, id_author, content_comments) VALUES 
('$idnews', '$idauthor', '$msg')"); 
$qc = mysqli_query ( $connect, "SELECT * FROM comments  WHERE id_post='$idnews' ");

$ccom=  mysqli_num_rows($qc);
$qc = mysqli_query ( $connect, " UPDATE posts SET ccomm=$ccom WHERE id='$idnews'");
?>