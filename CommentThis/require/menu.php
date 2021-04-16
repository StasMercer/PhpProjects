<?php

if (isset($_SESSION['login']) )
{
      $aMenu=array
     (
       'Головна'=>'main.php',
       'Новини'=>'news.php',
       'Події'=>'event.php',
       'Кабінет'=>'kabinet.php',
       'Користувачі'=>'members.php',
     );
}
else
{
    $aMenu=array
    (
     'Головна'=>'main.php',
     'Новини'=>'news.php',
     'Події'=>'event.php',
    );
}
if (isset($_SESSION['login']) )
{
	$aRMenu=array
                (
                       'Вийти'=>'logout.php',

               );
}
else
{
	$aRMenu=array
                (
                       'Увійти'=>'login.php',
                       'Реєстрація'=>'signup.php'
               );
}

?>




<?php 
foreach($aMenu as $k => $v)
{
     echo '<a class="links col-md-1" href=index.php?pn='.$v.' data-clone='.$k.'>  '.$k.'</a>'. PHP_EOL;
}


foreach($aRMenu as $k => $v)
{
     echo '<a class="links sign col-md-1" href=index.php?pn='.$v.' data-clone='.$k.'> '.$k.'</a>'. PHP_EOL;
}			

?>