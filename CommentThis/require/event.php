<?php

include("db.php");

$q = mysqli_query ( $connect, "SELECT * FROM event ORDER BY date_post DESC");
while ($row = mysqli_fetch_assoc($q)) {


echo '

     
            <div class="c-box b'.$row["id"].'">
            <h3>'.$row["date_post"].' — '.$row["title_post"].'  </h3>  
            <i data-bm="r'.$row["id"].'" data-bl="b'.$row["id"].'"  onclick="return RBclose(this);" class="fa fa-close close-news" hidden="true"></i>    
        
<p  class="read r'.$row["id"].'" >';

$path=$_SERVER['DOCUMENT_ROOT'].'/fotonews/'.$row["id"].'.jpg';
if (file_exists($path))
 {
echo '<img src="../fotonews/'.$row["id"].'.jpg" alt="Зображення відсутне" class="img-responsive img-rounded">';
}

  echo           $row["content_post"].' </p>
            <span class="under"> Автор:';

echo $row['author_post'];
/////////////////////////////////////////////////////////////////////////
echo 'Переглядів: &nbsp'.$row['cview'];
echo '
<a id="more" data-bm="r'.$row["id"].'" data-bl="b'.$row["id"].'" data-id="'.$row["id"].'" href="index.php?pn=news.php#'.$row['id'].'" >Читати більше</a></span>
            <form method="POST"  class="msg-form"><input type="text" placeholder="Написати повідомлення" class="message" name="inpt-msg">
             <button type="submit" class="msg" >
             <i class="fa fa-paper-plane"></i>
             </button></form>
        
    </div>
    ';
}


?>

<script>
    
 

function RB(Element) {

	 var rr=Element.dataset.bm;
         var bb=Element.dataset.bl;  
         var id=Element.dataset.id;
$('.'+bb).addClass('open-box');
$('.'+bb).children('.under').hide();
   
$('.'+rr).addClass('open-read');

$('.'+bb).children('.msg-form').show(300);
$('.msg-form').children('.msg').show(300);  
$('.'+bb).children('.fa-close').show(300);
    
           $.ajax({
                  url: "../require/click.php",                    
                   type: 'POST',
                   data: "id="+id
               
                });
  } 
    
    function RBclose(Element){
        
            var rr=Element.dataset.bm;
            var bb=Element.dataset.bl;  
    
        $('.'+bb).removeClass('open-box');
        $('.'+bb).children('.under').show();
   
        $('.'+rr).removeClass('open-read');

        $('.'+bb).children('.msg-form').hide();
        $('.'+bb).children('.msg').hide();  
        $('.'+bb).children('.fa-close').hide();
        
        
    }
     
    
</script>


