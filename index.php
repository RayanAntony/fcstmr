<?php include_once('header.php'); 
session_start();
if(!empty($_SESSION['result']['id'])) {
header('location:profile.php');
}

$options = [
    'cost' => 12,
];
echo $hash = password_hash('F($tm6', PASSWORD_DEFAULT);
echo "<br>";
if (password_verify('F($tm6', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

?>
<div class="login-form">
    <form action="/examples/actions/confirmation.php" method="post">
        <h2 class="text-center">Sign in</h2>   
        <div class="form-group">
          <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <span class="fa fa-user"></span>
                    </span>                    
                </div>
                <input type="text" class="form-control" name="username" placeholder="Username" required="required">       
            </div>
        </div>
    <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-lock"></i>
                    </span>                    
                </div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">       
            </div>
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-primary login-btn btn-block"><i class="fa fa-sign-in"></i> Sign in</button>
        </div>
    </form>
</div>
 <?php include_once('footer.php'); ?>