<?php 
	session_start();
?>
<html>
    <title>
        web page
    </title>
    
 <link rel="stylesheet" href="web.css">
    <body class="background-image">
        <div class="center">
            <h1>Login</h1>
            <form method="post" action="logdb.php">
              <div class="field">
                Username
                <input type="text" required name="Username" value="<?php if (isset($_COOKIE['usergin'])) { echo $_COOKIE['usergin'];}?>">
                <span></span>
                
              </div>
              <div class="field">
                Password
                <input type="password" required name="Password" value="<?php if (isset($_COOKIE['userword'])) {echo $_COOKIE['userword'];}?>">
                <span></span>
              </div>
              <div >
                <input type="checkbox" name="remember" 
                <?php if (isset($_COOKIE['usergin'])) { ?>
                   checked 
                   <?php } ?>  id="remember">
                <label class="form-check-label" for="remember">Remember Me</label>
                </div>
              <input type="submit" value="Login" name="log">
              <div class="signup" >
                Not a member? <a href="regis.php">Signup</a>
              </div>
            </form>
          </div>
    </body>
</html>