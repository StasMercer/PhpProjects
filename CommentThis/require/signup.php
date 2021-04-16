<?php
    require("db.php");
    $data=$_POST;
    $errors=array();
    $set=false;
    $status='user';
    if (isset($data['username'])){
        $username=$_POST['username'];
    }

   if (isset($data['login'])){
    $login=$_POST['login'];
   }

    if (isset($data['password'])){  
      $password=$_POST['password'];
    }


    if (isset($data['email'])){      
           $email=$_POST['email'];
    }


    if (isset($data["do_signup"])){
        //провірка введених даних на пустоту
       
    if (trim($data['username'])==''){
        $errors['miss_username']='input username';
    }    
        
        if ( trim($data['login']) == '') 
 	{
 		$errors['miss_login'] = 'Введіть логін!';
 	}

 	if ( trim($data['email']) == '')
 	{
 		$errors['miss_email'] = 'Введіть email!';
 	}

	if ( ($data['password']) == '') 
	{
 		$errors['miss_password'] = 'Введіть пароль!';
 	}
        
        
       // провірка логіна і мейла на співпадіння з базою 
      $query_login = "SELECT login FROM users WHERE login='$login'";
        
      
       $select_login=mysqli_query($connect,$query_login);
        
        if(mysqli_num_rows($select_login)>0){
            $errors['login_isset'] ='Такий логін вже існує';
        }
            
         $query_email = "SELECT email FROM users WHERE email='$email'";
        
        $select_email=mysqli_query($connect,$query_email);
        
        if(mysqli_num_rows($select_email)>0){
            $errors['email_isset'] ='Такий Email вже існує';
        }
        
      
       
        //запис даних в базу
        if (empty($errors)){
            $result = mysqli_query($connect,"INSERT INTO users (userstatus,user_name,login,email,password) VALUES ('$status','$username','$login','$email','$password')");
             if ($result) $set=true;
           }
                
    
    }
?>


    <form name="signup" action="index.php?pn=signup.php" method="post">
       
       <div class="form-group">
           
           
            <label for="username-input" class="control-label">
                    Введіть ваше ім'я 
                
                </label>
                
                
            <input id="username-input" class="form-control" type="text" name="username" placeholder="Введіть Ім'я">
        </div>
       
       
        <div class="form-group <?php if (isset($errors['login_isset'])){ echo" has-error ";} ?>">
           
           
            <label for="login-input" class="control-label">
            
            
            <?php if (isset($errors['login_isset'])){ 
                    echo "Логін зайнятий";
                }else echo"Введіть логін"
            ?>
                
                
                </label>
                
                
            <input id="login-input" class="form-control" type="text" name="login" placeholder="Введіть Логін">
        </div>

       
    <div class="form-group <?php if ($errors['email_isset']!=''){ echo" has-error ";} ?>">
           
           
            <label for="email-input" class="control-label">
            
            
            <?php if (isset($errors['email_isset'])!=''){
                    echo "Такий Емейл вже існує";   
                }else echo "Введіть Емейл";
            ?>
                
                
                </label>
        <input id="email-input" class="form-control" placeholder="Введіть Email" type="email" name="email">

    </div>
        
        
        <div class="form-group">
           
           
            <label for="password-input" class="control-label">
                    Введіть пароль
            </label>
        <input id="password-input" class="form-control" type="password" pattern="[A-Za-zА-Яа-я0-9]{2,}" name="password" placeholder="Введіть пароль">
        </div>
        
        
        <button class="btn btn-<?php
                     
                       if ($set==true){
                           echo "success";
                       }else echo "primary";
                       ?>" id="inputError1" type="submit" name="do_signup">Готово</button>
        
        <?php
        
         if ($set==true) echo "<span style='color:green'>Вітаємо ви успішно зареєструвались</span>"
        ?>

    </form>