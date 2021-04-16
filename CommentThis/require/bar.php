<div class="sidebar">
<div class="bar">
    <ul>
        <?php if (isset($_SESSION['login']))echo '<li id="b-create"><br><i  class="fa fa-plus"><br></i><br>Додати</li>'
        ?>
        <li  id="b-search"><br><i class="fa fa-search"></i><br>Пошук</li>
        <li  id="b-top-news"><i class="fa fa-star"></i><br>Топ<br>Новини</li>
        <li  id="b-events"><br><i class="fa fa-calendar-o"></i><br>Події</li>
        <li  id="b-last-news"><i class="fa fa-user"></i><br>Останні<br>Новини</a></li>
    </ul>

</div>

<div id="search" class="bar-point">

 <?php

include ("search.php");
?> 




</div>

<div id="events" class="bar-point">
    <h3>Події</h3>
    <ul>
<?php
       
$q = mysqli_query ( $connect, "SELECT * FROM event ORDER BY cview DESC LIMIT 7");
while ($row = mysqli_fetch_assoc($q)) {
                           echo '<li class="t-block"><a href="#'.$row['id'].'">'.$row['title_post'].'</a></li>';
                           }  
?>
    </ul>

</div>

<div id="top-news" class="bar-point">
    <h3>Топ Новини</h3>
    <ul>
<?php
       
$q = mysqli_query ( $connect, "SELECT * FROM posts ORDER BY cview DESC LIMIT 7");
while ($row = mysqli_fetch_assoc($q)) {
                           echo '<li class="t-block"><a href="#'.$row['id'].'">'.$row['title_post'].'</a></li>';
                           }  
?>
  </ul>
</div>

<div id="last-news" class="bar-point">
    <h3>Останні Новини</h3>
    <ul>
<?php
       
$q = mysqli_query ( $connect, "SELECT * FROM posts ORDER BY date_post DESC LIMIT 7");
while ($row = mysqli_fetch_assoc($q)) {
                           echo '<li class="t-block"><a href="#'.$row['id'].'">'.$row['title_post'].'</a></li>';
                           }  
?>
    </ul>
</div>

</div>