<div class="wrapper" id="content">
    
    <div class="cabinet">
       


        <?php
                               if (isset($_SESSION['login']) )
                                 {
	                           echo 'Вітаємо, '.$username.'!';

                                 }
                                   else
                               {
	                          echo ' Вітаємо Вас у місці, де можна оглянути останні новини, ознайомитись з анонсом подій та прийняти участь у їх обговоренні. <br>Авторизуйтесь для початку роботи!';
                              }
?>
<br>
Сьогодні &nbsp
<?php
$today = date("F j, Y, g:i a");
echo $today ;
include ("setonline.php");
?>
   </div>

    <?php
if (isset($p)) { include ($p); }
?>
    

 



</div>