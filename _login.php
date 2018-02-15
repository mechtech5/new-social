<?php include('./classes/DB.php'); 
        if(isset($_POST['login'])) { 
                $username = $_POST['username_email']; 
                $email = $_POST['username_email']; 
                $password = $_POST['password']; 
                $userquery = DB::query("SELECT username FROM users WHERE username=:username OR email=:email",array(':username'=>$username,':email'=>$email)); 
                $passwordquery = DB::query("SELECT password FROM users WHERE username=:username OR email=:email",array(':username'=>$username,':email'=>$email)); 
                if($userquery) { 
                        if(password_verify($password, $passwordquery[0]['password'])) { 
                                $username = $userquery[0]['username']; 
                                header( "Location: home.php?username=".$username); 
                                echo "Logged in!<br />";
                         } else { 
                                echo "Incorrect password!"; 
                        }
                 } else { 
                        echo "User not registered!"; 
                } 
        } 
?> 
<h1>Login to your account</h1>
<form action="login.php" method="post">
<input type="text" name="username_email" value="" placeholder="Username ..."><p />
<input type="password" name="password" value="" placeholder="Password ..."><p />
<input type="submit" name="login" value="Login">
</form>