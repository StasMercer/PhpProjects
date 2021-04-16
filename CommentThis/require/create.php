<?php

require_once("db.php");
$errors=array();
  $data=$_POST;
    
    
if (isset($data['do_create'])){
    if(trim($data['news-text'])==''){
        $errors[]='Введіть текст';
    }
    if(trim($data['article'])==''){
        $errors[]='Введіть текст';
    }
    
    $article=$_POST['article'];
    $ntext=$_POST['news-text'];
    $log=$_SESSION['login'];
    $author=$_SESSION['userid'];
    
    
    
    if (empty($errors)){
        $result = mysqli_query($connect,"INSERT INTO posts (author_post,title_post,content_post) VALUES ('$author','$article','$ntext')");
    }
    
}

    
?>
 

 <form class="create"  action="index.php?pn=create.php" method="post">
  <p><?php 
        if ($result){
            echo 'Ваша новина додана';
            echo ($author);
        }else echo 'Додайте власну новину, щоб інші люди змогли її прокоментувати';
      
      ?></p>
  
   <input name="article" type="text" placeholder="Заголовок" class="form-control">
    <textarea name="news-text"  placeholder="Введіть текст" cols="30" rows="10" class="form-control"></textarea>
    <button name="do_create" type="submit" class="form-control btn btn-primary">
        Додати
    </button>
</form>