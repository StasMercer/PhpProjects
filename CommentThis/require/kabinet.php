<?php 
echo '<h3> Ваші новини</h3>';  
include("db.php"); 
$username=$_SESSION['username']; 
$userid=$_SESSION['userid']; 
$q = mysqli_query ( $connect, "SELECT * FROM posts WHERE author_post='$userid' ORDER BY date_post DESC"); 
while ($row = mysqli_fetch_assoc($q)) { 
  
echo '
            <div class="c-box b'.$row["id"].'">
            <h3>'.$row["date_post"].' — '.$row["title_post"].'  </h3>  
            <i data-bm="r'.$row["id"].'" data-bl="b'.$row["id"].'"  onclick="return RBclose(this);" class="fa fa-close close-news" hidden="true"></i>    
        
            <div class="read r'.$row["id"].'" >';

                                 $path=$_SERVER['DOCUMENT_ROOT'].'/fotonews/'.$row["id"].'.jpg';
                                if (file_exists($path))
                                            {
                                            echo '<img src="../fotonews/'.$row["id"].'.jpg" alt="Зображення відсутне" class="img-responsive img-rounded">';
                                            }


echo   $row["content_post"];

///////////// коментарі/////////////////////////////

           echo '<div style="border-top: 1px solid silver; position: relative;
    margin-top: 40px;" id="commblock'.$row["id"].'" >';
                     include ('viewcom.php');
          echo '</div>';
/////////////////////////////////////

echo ' </div>';

echo '            <span class="under"> Автор:';
$idautor= $row['author_post'];
$qauthor = mysqli_query ( $connect, "SELECT * FROM users WHERE id='$idautor'");
$rowauthor = mysqli_fetch_assoc($qauthor) ;

echo $rowauthor['user_name'];
/////////////////////////////////////////////////////////////////////////
echo '&nbsp Переглядів: &nbsp'.$row['cview'];
echo '
<a id="more" data-bm="r'.$row["id"].'" data-bl="b'.$row["id"].'" data-id="'.$row["id"].'" href="#" onclick="return RB(this);" >Читати більше</a></span>
            <form   class="msg-form" data-id="'.$row["id"].'" data-authorid="'.$userid.'" onsubmit="return SendMsg(this.dataset.id, this.dataset.authorid);">

          <i data-bm="r'.$row["id"].'" data-bl="b'.$row["id"].'"  onclick="return RBclose(this);" class="fa fa-close close-news close-news-2" hidden="true"></i> 
            <input type="text" placeholder="Написати повідомлення" class="message"  id="message'.$row["id"].'" name="inpt-msg" >
             <button type="button" class="msg" >
             <i class="fa fa-paper-plane" onclick="return SendMsg(this.dataset.id, this.dataset.authorid);" data-id="'.$row["id"].'" data-author="'.$username.'"  data-authorid="'.$userid.'" id=ffp'.$row["id"].'"></i>
             </button>
             </form>
        
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
$('.fa-paper-plane').focus();
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

    function SendMsg(dataid, idauthor){

            var idnews=dataid;
            var msg=$('#message'+idnews).val();  

if (msg!='') {


           $.ajax({
                  url: "../require/sendcom.php",                    
                   type: 'POST',
                   data: 'idnews='+idnews+'&idauthor='+idauthor+'&msg='+msg
                 });
             
     $('#message'+idnews).val('');

    $.ajax({
        url: '../require/viewcom.php',
       type: 'POST',
       data: 'newsid='+idnews,
        success: function(data) {
            $('#commblock'+idnews).html(data);
        }
       });

  } 

return false;
}
</script>
