<div class="first-sign">
    <div class="f-block">
        <h3>Топ Новина</h3>
        <p>

<?php
$q = mysqli_query ( $connect, "SELECT * FROM posts ORDER BY cview DESC LIMIT 1");
$row = mysqli_fetch_assoc($q);
$path=$_SERVER['DOCUMENT_ROOT'].'/fotonews/'.$row["id"].'.jpg';
if (file_exists($path))
 {
echo '<img src="../fotonews/'.$row["id"].'.jpg" alt="Зображення відсутне" class="img-responsive img-rounded">';
}

/////////////////////////////////////////////////////////////////////////
echo '<b>'.$row['title_post'].'</b><br>';
echo $row['content_post'];
///////////////////////////////////////////////////////////////////////
?>

</p>
        
        <span class="under-block">Автор:


<?php
/////////////////////////////////////////////////////////////////////////
$idautor= $row['author_post'];
$qauthor = mysqli_query ( $connect, "SELECT * FROM users WHERE id='$idautor'");
$rowauthor = mysqli_fetch_assoc($qauthor) ;

echo $rowauthor['user_name'];

///////////////////////////////////////////////////////////////////////
?>


<a href="index.php?pn=news.php#<?php echo $row['id']; ?>">Долучитись</a></span>
    </div>


    <div class="f-block">
         <h3>Головна Подія</h3>
 <p>
<?php
$q = mysqli_query ( $connect, "SELECT * FROM event ORDER BY cview DESC LIMIT 1");
$row = mysqli_fetch_assoc($q);
$path=$_SERVER['DOCUMENT_ROOT'].'/fotonews/'.$row["id"].'.jpg';
if (file_exists($path))
 {
echo '<img src="../fotonews/'.$row["id"].'.jpg" alt="Зображення відсутне" class="img-responsive img-rounded">';
}

/////////////////////////////////////////////////////////////////////////
echo '<b>'.$row['title_post'].'</b><br>';
echo $row['content_post'];
///////////////////////////////////////////////////////////////////////
?>

</p>
        
        <span class="under-block">Автор:


<?php
/////////////////////////////////////////////////////////////////////////
$idautor= $row['author_post'];
$qauthor = mysqli_query ( $connect, "SELECT * FROM users WHERE id='$idautor'");
$rowauthor = mysqli_fetch_assoc($qauthor) ;

echo $rowauthor['user_name'];

///////////////////////////////////////////////////////////////////////
?>

<a href="index.php?pn=news.php#<?php echo $row['id']; ?>">Долучитись</a></span>
    </div>


    <div class="f-block">
         <h3>Остання Новина</h3>
        <p>


<?php
$q = mysqli_query ( $connect, "SELECT * FROM posts ORDER BY date_post DESC LIMIT 1");
$row = mysqli_fetch_assoc($q);
$path=$_SERVER['DOCUMENT_ROOT'].'/fotonews/'.$row["id"].'.jpg';
if (file_exists($path))
 {
echo '<img src="../fotonews/'.$row["id"].'.jpg" alt="Зображення відсутне" class="img-responsive img-rounded">';
}

/////////////////////////////////////////////////////////////////////////
echo '<b>'.$row['title_post'].'</b><br>';
echo $row['content_post'];
///////////////////////////////////////////////////////////////////////
?>

</p>
        
        <span class="under-block">Автор:


<?php
/////////////////////////////////////////////////////////////////////////
$idautor= $row['author_post'];
$qauthor = mysqli_query ( $connect, "SELECT * FROM users WHERE id='$idautor'");
$rowauthor = mysqli_fetch_assoc($qauthor) ;

echo $rowauthor['user_name'];

///////////////////////////////////////////////////////////////////////
?>

<a href="index.php?pn=news.php#<?php echo $row['id']; ?>">Долучитись</a></span>
    </div>
 <div class="f-block">
         <h3>Вибір Редакції</h3>
        <p>

<?php
$q = mysqli_query ( $connect, "SELECT * FROM posts ORDER BY ccomm DESC LIMIT 1");
$row = mysqli_fetch_assoc($q);
$path=$_SERVER['DOCUMENT_ROOT'].'/fotonews/'.$row["id"].'.jpg';
if (file_exists($path))
 {
echo '<img src="../fotonews/'.$row["id"].'.jpg" alt="Зображення відсутне" class="img-responsive img-rounded">';
}

/////////////////////////////////////////////////////////////////////////
echo '<b>'.$row['title_post'].'</b><br>';
echo $row['content_post'];
///////////////////////////////////////////////////////////////////////
?>

</p>
        
        <span class="under-block">Автор:


<?php
/////////////////////////////////////////////////////////////////////////
$idautor= $row['author_post'];
$qauthor = mysqli_query ( $connect, "SELECT * FROM users WHERE id='$idautor'");
$rowauthor = mysqli_fetch_assoc($qauthor) ;

echo $rowauthor['user_name'];

///////////////////////////////////////////////////////////////////////
?>


<a href="index.php?pn=news.php#<?php echo $row['id']; ?>">Долучитись</a></span>
    </div>



</div>
