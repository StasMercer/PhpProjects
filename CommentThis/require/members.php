<h3>Користувачі нашого блогу</h3>
<table class="table table-striped table-bordered">

<tr>
             <td style="font-weight:bold;"> Ім’я
             </td>
             <td style="font-weight:bold;">Дата реєстрації
             </td >
             <td style="font-weight:bold;">Кількість <br>новин
             </td>
             <td style="font-weight:bold;">Кількість<br> коментарів
             </td>
             <td style="font-weight:bold;"> Статус
             </td>
</tr>

<?php


$q = mysqli_query ( $connect, "SELECT * FROM users ORDER BY date_reg DESC");

while ($row = mysqli_fetch_assoc($q)) {
//$on=date_diff( $row['visits'], CURRENT_TIMESTAMP);
//echo $on;

//if (TIMESTAMPDIFF(minute, $row['visits'], CURRENT_TIMESTAMP)<20) {$color='green';} else {$color='gray';}

$userid=$row['id'];
$qpost = mysqli_query ( $connect, "SELECT * FROM posts WHERE author_post='$userid'");
$userpost=mysqli_num_rows($qpost);
$qcomm = mysqli_query ( $connect, "SELECT * FROM comments WHERE id_author='$userid'");
$usercomm=mysqli_num_rows($qcomm);

echo '<tr>
             <td>'. $row['user_name'].'
             </td>
             <td>'. $row['date_reg'].'
             </td>
             <td>'.$userpost.'
             </td>
             <td>'.$usercomm.'
             </td>
             <td> '. $row['userstatus'].'
             </td>
</tr>';
}
?>
</table>