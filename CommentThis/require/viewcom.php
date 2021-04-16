<?php
$rn=20000;
include("db.php");
$newsid=$_POST['newsid'];
if ($newsid!=0) {$rn=$newsid;} 
else {
$rn=$row["id"];}



$qc = mysqli_query ( $connect, "SELECT * FROM comments  WHERE id_post='$rn' ORDER BY date_comm ASC");

while ($comm = mysqli_fetch_assoc($qc)) {
echo '<div class="comment">';
echo '<div class="com-author">';
echo '<i class="fa fa-user-circle"> </i>';
$idautor= $comm['id_author'];
$qauthor = mysqli_query ( $connect, "SELECT * FROM users WHERE id='$idautor'");
$rowauthor = mysqli_fetch_assoc($qauthor) ;
if (!isset($rowauthor)) {
 echo 'Гість';
}else {
echo $rowauthor['user_name'];}





echo '&nbsp';

echo '</div> ';

echo '<div class="comment-cont ">';
echo $comm['content_comments'];
echo '<div class="com-date">';
echo  $comm['date_comm'];
echo'</div>';
echo'</div>';
echo '</div>';
}

?>