<?php 

 
   $data = $_POST; 

  if (isset($data['do_login'] )) {
      
    if(trim($data['login'])==''){
        $errors[]="Ведіть логін";
    } else if (trim($data['password'])==''){
        $errors[]="Ведіть пароль";
    } 
      
    $log=$data['login'];
    $pass=$data['password'];
      
     $user  = mysqli_query( $connect, "SELECT * FROM users WHERE login='$log' AND password='$pass'"); 
      
    if (mysqli_num_rows($user)==0){
        $errors[]="Ви ввели не коректний логін або пароль";
    }
 
      
    
      
      
     if (empty($errors)){   
        
         $_SESSION['login'] = $data['login'];
         $_SESION['username']=$data['username']; 
         include ("setonline.php");
         echo '<script type="text/javascript">
                            window.location = "index.php"
                  </script>';
     }
   }
  ?> 
    
  
  

   <p class="loginfo"><strong><?php
        if(!empty($errors)){
            echo array_shift($errors);
        }else echo"Введіть логін і пароль:";
       
       ?> </strong></p>     
        
<div class="formfull">  
         
  <form action="index.php?pn=login.php" method="POST"> 
      
     <input class="inpt form-control" pattern="[A-Za-zА-Яа-я0-9]{2,}" placeholder="Ваш логін" type="text" name="login" value=""><br> 
      
     <p> 
     <input class="inpt form-control" pattern="[A-Za-z0-9]{2,}" type="password" name="password" placeholder="Ваш пароль" value=""> 
     </p> 
     <button type="sumbit" class="btn btn-primary form-control"  name="do_login">Увійти</button> 
   
  </form> 
      
  </div>  
             
 