
<p style="color:blue">
<?php


$q = mysqli_query ( $connect, "SELECT * FROM users WHERE TIMESTAMPDIFF(minute, visits,CURRENT_TIMESTAMP)<20");
while ($row = mysqli_fetch_assoc($q)) {
echo $row['user_name'].'-/-/-';
}

?>
</p>