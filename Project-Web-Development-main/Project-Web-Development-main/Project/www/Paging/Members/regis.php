<!DOCTYPE html>
<html>
    <title>
        web page
    </title>
 <link rel="stylesheet" href="web.css">
    <body class="background-image">
        <div class="center">
            <h1>REGISTER</h1>
            <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
            <form method="post" action="regis2.php">
              <div class="field">
                Username
                <input type="text" name="Username" required>
                <span></span>
              </div>
                <div class="field">
                  Password
                  <input type="Password" name="Password" required>
                  <span></span>
                </div>
              <div class="field">
                name
                <input type="text" name="name_cus" required>
                <span></span>
              </div>
              <div class="field">
                surname
                <input type="text" name="sur_cus" required>
                <span></span>
              </div>
              <div class="field">
                Address
                <input type="text" name="address" required>
                <span></span>
              </div>
              <div class="field">
                Phone Number
                <input type="text" required name="Phone_cus"
                pattern="[0-9]{10}">
                <span></span>
              </div>
              <input type="submit" value="REGISTER" name="reg">
            </form>
          </div>
    </body>
</html>