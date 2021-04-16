<?php

if (isset ($_POST['searchword'])) { $swrd=$_POST['searchword'];} else {$swrd='Пошук';}
echo 'Введіть автора';
include("db.php");
echo '
  <form role="search" method="POST" onsubmit="return Search();">
        <input placeholder="'.$swrd.'" type="text" id="searchword" name="searchword">
    </form>
';
/////////////////////////////////////////////////////////////////////////
$targetauthor= $swrd;
$qauthor = mysqli_query ( $connect, "SELECT * FROM users WHERE user_name='$targetauthor'");
$rowauthor = mysqli_fetch_assoc($qauthor) ;

$idautor= $rowauthor['id'];

///////////////////////////////////////////////////////////////////////

$q = mysqli_query ( $connect, "SELECT * FROM posts WHERE  author_post='$idautor' ORDER BY date_post DESC");

echo '<div class="bar-point search-result" >
         <ul>';
                          while ($row = mysqli_fetch_assoc($q)) {
                                  echo '<li class="t-block"><a href="index.php?pn=news.php#'.$row['id'].'">'.$row['title_post'].'</a></li>';
                            }

echo '</ul>
        </div>';
?>

<script>
    function Search(){

            var swrd=$('#searchword').val();  

           if (swrd!='') {

                    $.ajax({
                             url: '../require/search.php',
                             type: 'POST',
                             data: 'searchword='+swrd,
                             success: function(data) {
                             $('#search').html(data);
                                 }
                            });
                            } 

return false;
}
</script>

