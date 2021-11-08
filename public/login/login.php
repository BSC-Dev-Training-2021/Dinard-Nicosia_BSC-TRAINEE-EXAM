<?php
require("backend-login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Squid Game Login</title>
</head>
<body class="body-login">
<div class="left">
    
</div>
<div class="right">
    <h1><span></span> WELCOME <span class="h-span1">PLA</span><span class="h-span2">YER</span></h1>
    <h3><img src="../image/user.png" alt="Logo"></h3>
    <?php display_alert($alert); ?>
    <form action="login.php" method="POST">
    <fieldset class="fieldset-login">
        <input type="email" name="login_email" placeholder="Email" class="login-user form-control" value="<?php echo $login_email;?>">
        <input type="password" name="login_pass" placeholder="Password" class="login-pass form-control" value="<?php echo $login_pass;?>">
        <div class="button">
            <button class="btn btn-primary btn-lg" type="submit" name="login_bttn">Login</button>
            <button class="btn btn-warning btn-lg"><a href="">Register</a></button>
        </div>
    </fieldset>
    </form>
    <div class="footer">
        <p ><a href="" class="link" >Play with us <strong class="strong">PLAYER</strong>?</a> </p>
    </div>
</div>
</body>
</html>